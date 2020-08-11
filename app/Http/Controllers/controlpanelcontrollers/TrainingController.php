<?php

namespace App\Http\Controllers\controlpanelcontrollers;



use App\Http\Controllers\Controller;
use App\Mail\NewPassword;
use App\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
const STUDENT_PAGINATION = 10;
const TRAINING_PAGINATION = 10;


class TrainingController extends Controller
{
    public function getSpecialTrainingStudents(){

        $students = DB::table('users')
        ->join('training','users.id','=','training.studentId')
        ->where('type','=','S')
        ->select('users.*','training.*')
        ->get();
        return view('base_layout.training.specialTraining',['students'=>$students]);
    }


    public function getApproved(Request $request){
        $students = DB::table('users')
            ->join('training','users.id','=','training.studentId')
            ->where('type','=','S')
            ->select('users.*','training.*')
           ->get();
        foreach ($students as $student){
            if ($request->has('chkBox')) {
                $student->approved= 1;
                DB::table('users')
                    ->join('training','users.id','=','training.studentId')
                    ->update(['approved' => 1]);
            }
        }
        return view('base_layout.training.specialTraining',['students'=>$students]);
    }

    public function getGeneralTrainingStudents(){
        $gTrainings= DB::table('training')
            ->where('training.type','=','G')
            ->join('users', 'training.studentId', '=', 'users.id')
            ->join('students','students.userId','=','training.studentId')
            ->join('choices','training.studentId','=','choices.stdID')
            ->select('training.id', 'users.name','students.stdId','choices.first_choice','choices.second_choice')
            ->paginate(TRAINING_PAGINATION);
        return view('base_layout.training.generalTraining',['gTrainings'=>$gTrainings]);

    }
    public function distributeStudents(){
        $gTrainings =$this->readGeneralTrainingInfo(); // read general type students info form DB
        $enterprises= $this->readEnterprisesInfo();   // read Enterprises info from DB
        // generate general training students score with each enterprise
        $studentsScore=$this->generateStudentsScores($gTrainings,$enterprises);
        $distTemp=$this->sortingStudentsScoresDescendingOrder($studentsScore);//sorting students scores in descending order
        $distTemp2 = array(); $maxscore = 0; $distributed = array();
        foreach ($distTemp as $key => $value) {$s_id = $key;
            foreach ($value as $enterprise) {
                $e_id = $enterprise["enterprise_id"]; //get the enterprise id, trainees needed and score
                $s_score = $enterprise["total_score"]; //for the first time the enterprise is looped create an empty entry for it
                $en_key=$e_id.'-'.$enterprise["sector_id"];
                if (!array_key_exists($en_key, $distTemp2)) {
                    $distTemp2[$en_key] = $this->defineEnterpriseArray($enterprises,$enterprise,$e_id);
                }
                $temparr = array(
                    'student_id' => $s_id,  'score' => $s_score,
                    'student_name' =>$this->getStdInfo($gTrainings,$s_id)['name'],'student_city' =>$this->getStdInfo($gTrainings,$s_id)['city'],);
                if(count($distTemp2[$en_key]["students"]) < $distTemp2[$en_key]["female_traniees"]+$distTemp2[$en_key]["male_traniees"] && !in_array($s_id, $distributed)){//if the enterprise is not full yet AND the student is not distributed
                    //check the student max score with the previously looped student & if the current student is >,add the student to the start of the array
                        if ($s_score > $maxscore) {
                            array_unshift($distTemp2[$en_key]["students"], $temparr);
                            $maxscore = $s_score;
                        } else {
                            array_push($distTemp2[$en_key]["students"], $temparr);
                        }
                        $sector=$distTemp2[$en_key]['sector'];
                        array_push($distributed, $s_id); //add the current student to the done array
                        $this->addDistributionData($s_id,$e_id,$sector);}}}
        if(count($distributed)==count($gTrainings)) { // check if all general students are distributed
            return view('base_layout.training.studentsDistribution', ['Training' => $distTemp2]);}
        else
            $this->distributeStudents();
        return view('base_layout.training.studentsDistribution',['Training'=>$distTemp2]);
    }

    // set password randomly ( 6 length)
    public function setPasswords($type){
        $students = DB::table('users')
            -> join('training','users.id','=','training.studentId')
            ->where('type','=',$type)
            ->select('users.*')->get();
        foreach ($students as $student){
            $password= str::random(6);
            Mail::to($student->email)->send(new NewPassword($password));
            sleep(1.1);
            $password=bcrypt($password);
            $affected = DB::table('users')
                ->where('id', '=',$student->id)
                ->update(['password' =>$password ]);
        }
        return redirect()->back()->with('success', 'تم تعيين كلمات السر بنجاح!');

    }
    private function generateStudentsScores($TrianingData , $enterprises){
        $studentsScore=[];

        // define distribution criterias
        $distribution_criterias= array(
            'sector' => array('total_score' => 50, 'secondary_score' => 0),
            'city' => array('total_score' => 50, 'secondary_score' => 0), );

        // starting matching the student with each enterprise based on city and sector
        foreach ($TrianingData as $gstd) {
            $student_id=$gstd->stdId;
            $student_first_choice = $gstd->first_choice;
            $student_second_choice = $gstd->second_choice;
            $student_city = $gstd->city;
            foreach ($enterprises as $enterprise) {
                $enterprise_city = $enterprise->city;
                $EnterpriseSectors=$this->getEnterpriseSectors($enterprise->id);
                // Add Score for student with available enterprises for start distribution
                foreach ($EnterpriseSectors as $sector){
                    $female_traniees = $sector->femaleStudentsNO;
                    $male_traniees = $sector->maleStudentsNO;
                    if ($student_first_choice == $sector->title || $student_second_choice == $sector->title ) {
                        $sector_score = $distribution_criterias['sector']['total_score'];
                    }
                    if ($student_city == $enterprise_city) {
                        $city_score = $distribution_criterias['city']['total_score'];
                    }
                    if ($student_city != $enterprise_city) {
                        if($student_city=="Gaza"){
                            $distribution_criterias['city']['secondary_score']=30;
                        }else if($student_city=="middle"){
                            $distribution_criterias['city']['secondary_score']=25;
                        } else if($student_city=="north"){
                            $distribution_criterias['city']['secondary_score']=15;
                        } else if($student_city=="khan Yonis"){
                            $distribution_criterias['city']['secondary_score']=15;
                        }else if($student_city=="Rafah"){
                            $distribution_criterias['city']['secondary_score']=15;
                        }
                        $city_score = $distribution_criterias['city']['secondary_score'];
                    }
                    if ($student_first_choice != $sector->title && $student_second_choice != $sector->title) {
                        $sector_score =50-$distribution_criterias['city']['secondary_score'];
                    }
                    // Array For student-Enterprise Score For Distribution
                    $student_enterprise = array(
                        'enterprise_id' => $enterprise->id,
                        'sector_id'=>$sector->id,
                        'E_sector'=>$sector->title ,
                        'total_score' => $sector_score+$city_score,
                        'female_traniees' => $female_traniees ,
                        'male_traniees' => $male_traniees ,
                    );
                    if(array_key_exists($student_id, $studentsScore)){
                        array_push($studentsScore[$student_id], $student_enterprise);
                    } else {
                        $studentsScore[$student_id]['student_id'] = $student_id;
                        $studentsScore[$student_id][1] = $student_enterprise;
                    }
                }
            }
        }
        return $studentsScore;

    }
    private function sortingStudentsScoresDescendingOrder($studentsSores){
        $distTemp=[];
        //loop the sorted array and create array for each enterprise
        //assign the top scored students to the enterprise taking in account the trainees number
        foreach ($studentsSores as $score){
            $student_id = $score['student_id'];
            $Enterprises = $score;
            //remove the student_id from the start of the array
            array_shift($Enterprises);
            $max_score = 0;
            $enterprisestemp = array();

            foreach ($Enterprises as $enterprise){
                if($enterprise['total_score'] >= $max_score){
                    array_unshift($enterprisestemp, $enterprise); // Add enterprise in the beginning of the array
                    $max_score = $enterprise['total_score'];
                } else {
                    array_push($enterprisestemp, $enterprise);
                }
            }
            $distTemp[$student_id] = $enterprisestemp;
        }
        return $distTemp;
    }
    private function defineEnterpriseArray($enterprises,$enterprise,$e_id){
        $array=array(
            'enterprise_id' => $enterprise["enterprise_id"] ,
            'female_traniees' => $enterprise["female_traniees"] ,
            'male_traniees' => $enterprise["male_traniees"] ,
            'enterprise_name' => $this->getEnterpriseInfo($enterprises,$e_id)['name'],
            "enterprise_city" => $this->getEnterpriseInfo($enterprises,$e_id)['city'],
            "sector_id" => $enterprise["sector_id"] ,
            "sector" => $enterprise["E_sector"] ,
            "students" => array(
            )
        );
        return $array;
    }
    private function readGeneralTrainingInfo(){
        $gTrainings= DB::table('training')
            ->where('training.type','=','G')
            ->join('users', 'training.studentId', '=', 'users.id')
            ->join('students','students.userId','=','training.studentId')
            ->join('choices','training.studentId','=','choices.stdID')
            ->join('address','students.addressId','=','address.id')
            ->select('training.id', 'users.name','students.stdId','choices.first_choice','choices.second_choice','address.city')
            ->get();
        return $gTrainings;
    }
    private function readEnterprisesInfo(){
        $enterprises=DB::table('enterprises')
            ->join('address','enterprises.addressId','=','address.id')
            ->select('enterprises.id','enterprises.name','address.city')
            ->get();
        return $enterprises;
    }

    private function getEnterpriseSectors($id){
        $enterpriseSectors=DB::table('enterprises')
            ->join('training_sectors', 'enterprises.id', '=', 'training_sectors.enterpriseId')

            ->where([['enterprises.id','=',$id],
                ['training_sectors.femaleStudentsNO', '>', '0'],
                ['training_sectors.maleStudentsNO', '>', '0'],
            ])
            ->select('training_sectors.*')
            ->get();
        return $enterpriseSectors;
    }

    private function getEnterpriseInfo($enterprises,$e_id){
        $en=[];
        foreach ($enterprises as $enterprise){
            if($enterprise->id==$e_id){
                $sectors=[];
                foreach ($this->getEnterpriseSectors($e_id) as $sector){
                    array_push($sectors,$sector->title);
                }
                $en['name']=$enterprise->name;
                $en['city']=$enterprise->city;
                $en['sectors']=$sectors;
                break;
            }
        }
        return $en;
    }
    private function getStdInfo($students,$s_id){
        $std=[];
        foreach ($students as $student){
            if ($student->stdId==$s_id){
                $std['name']=$student->name;
                $std['city']=$student->city;
                $std['first_choice']=$student->first_choice;
                $std['second_choice']=$student->second_choice;
                break;
            }
        }
        return $std;
    }
    private function addDistributionData($sid,$eid,$sector){
        $id=DB::table('students')
            ->where('stdId','=',$sid)
            ->select('userId')
        ->get();
        $affected = DB::table('training')
            ->where('studentId', '=',$id[0]->userId)
            ->update(['enterpriseId' => $eid,'sector'=>$sector,'approved'=>1]);
        return $affected;
    }
    private function sendEmails($array){
            foreach ($array as $arr){
                Mail::to($arr['email'])->send(new NewPassword($arr['password']));
                sleep(1);
            }
    }




}
