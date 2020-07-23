@extends('website.base_layout')
@section('style')
    <style>
        .list-type1{
            width:700px;
            margin:0 auto;
        }

        .list-type1 ol{
            counter-reset: li;
            list-style: none;
            *list-style: decimal;
            font-size: 16.6px;
            padding: 0;
            margin-bottom: 4em;
        }
        .list-type1 ol ol{
            margin: 0 0 0 2em;
        }

        .list-type1 p{
            text-align: center;
            position: relative;
            display: block;
            padding: .5em .5em .5em 3em;
            *padding: .4em;
            margin: .6em 0;
            background: #ebebeb;
            color: #000;
            -moz-border-radius: .3em;
            -webkit-border-radius: .3em;
            border-radius: 10em;
        }

        .list-type1 p:before{
            content: counter(li);
            counter-increment: li;
            position: absolute;
            left: -1.3em;
            top: 50%;
            margin-top: -1.3em;
            background:cornflowerblue;
            height: 3em;
            width: 3em;
            line-height: 2em;
            border: .3em solid #fff;
            text-align: center;
            font-weight: bold;
            -moz-border-radius: 2em;
            -webkit-border-radius: 2em;
            border-radius: 2em;
            color:#FFF;
        }
    </style>
@endsection
@section('content')
    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img
                    src="{{asset('website/img/header.jpg')}}"
                    alt=""
                    class="img-fluid rounded opacity"
            />
            <div class="carousel-caption">
                <p class="lead position-text color" style="font-size: 3rem;">
                    <i class="fa fa-angle-right fa-rotate-right "></i>
                    دليل التدريب الميداني
                    <i class="fa fa-angle-left fa-rotate-left text-dark"></i>
                </p>
                <p style="font-size: 2rem;">                    كلية تكنولوجيا المعلومات
                </p>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <!-- التدريب الميداني -->
        <div class="row">
            <div class="col-md-6">
                <img
                        src="{{asset('website/img/pexels-photo-326508.jpeg')}}"
                        class="img-fluid rounded"
                        alt=""
                />
            </div>
            <div class="col-md-6">
                <h3 class="text-right text-primary">مفهوم التدريب الميداني</h3>
                <p class="lead text-right">
                    من خلال هذا البرنامج التدريبي يتعين على طلاب كلية تكنولوجيا المعلومات قضاء فترة من التدريب العملي التي تقدر (بما لا يقل عن 280 ساعة عمل أي ثمانية أسابيع لدى القطاعات الحكومية، أو 280 ساعة عمل أي سبعة أسابيع لدى القطاعات الخاصة) ذات العلاقات بمجالات تخصصاتهم، ويهدف هذا البرنامج إلى تعميق المفاهيم التي تلقوها نظرياً عن طريق ربطها بالواقع العملي وفهم طبيعته وتزويد الطلاب المتدربين بالخبرة العملية وتنمية قدراتهم الوظيفية.                </p>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- متطلبات التدريب -->
    <!-- deck one -->
    <div class="container">
        <h2 class="text-center m-4">المتطلبات الأكاديمية للتدريب </h2>
        <h6 class="text-center m-4">لكي يصبح الطالب مرشحاً لتسجيل التدريب العملي عليه إستيفاء الشروط التالية:</h6>
        <div class="card-deck mt-4">
            <div class="card hover">
                <i  aria-hidden="true" class="fa fa-check-circle fa-3x text-center m-2 p-1"
                        style="color: cornflowerblue ;"
                ></i>
                <hr class="divider" style="  border: 1px solid cornflowerblue;">
                <div class="card-body">
                    <p class="card-text text-right">
                        أن يكون الطالب قد اجتاز مقررات التخصص (دال – عال – نال) للمستوى الخامس كاملة، في الفصل الذي يسبق التقدم للتدريب العملي مبشرة (أي عند التقدم للطلب)
                    </p>
                </div>
            </div>
            <div class="card hover">
                <i  aria-hidden="true" class=" fa fa-check-circle fa-3x text-center m-2 p-1"
                    style="color: cornflowerblue ;"
                ></i>
                <hr class="divider" style="  border: 1px solid cornflowerblue;">
                <div class="card-body">
                    <p class="card-text text-right">
                         أن يكون الطالب متفرغاً للتدريب، ويسمح للطالب تسجيل مادة واحدة فقط خلال الفصل الذي سيتدرب فيه على أن لا يتعارض مع تدريبه ويتحمل مسئولية التنسيق مع جهة التدريب أو خلافه
                    </p>
                </div>
            </div>
            <div class="card hover">
                <i  aria-hidden="true" class=" fa fa-check-circle fa-3x text-center m-2 p-1"
                    style="color: cornflowerblue ;"
                ></i>
                <hr class="divider" style="  border: 1px solid cornflowerblue;">
                <div class="card-body">
                    <p class="card-text text-right">
                        أن لا يكون الطالب مطوياً قيده
                    </p>
                </div>
            </div>
        </div>
        <!-- end deck one -->
    </div>
    <div class="container">
        <h2 class="text-center m-4">مجالات التدريب </h2>
        <h6 class="text-center m-4">يحرص الطالب المتدرب أن يكون تدريبه في ما تعلمه من مهارات متعددة في دراسته الأكاديمية كأن يكون التدريب في أحد المجالات التالية : </h6>
        <hr class="divider" style="  border: 1px solid cornflowerblue; width: 60%;">
        <ul class="list-inline text-center">
            <li class="list-inline-item m-2 p-2">تصميم و برمجة المواقع </li>
            <li class="list-inline-item m-2 p-2">قواعد البيانات</li>
            <li class="list-inline-item m-2 p-2">أمن المعلومات</li>
            <li class="list-inline-item m-2 p-2">التصميم الجرافيكي</li>
            <li class="list-inline-item m-2 p-2">برمجة الهواتف الذكية</li>
        </ul>
        <h2 class="text-center m-4">متطلبات اجتياز التدريب الميداني </h2>
        <hr class="divider" style="  border: 1px solid cornflowerblue; width: 60%;">
        <div class="list-type1">
        <ol class="gradient-list">
            <li>	<p>
                    <span style="color: cornflowerblue;"><b> نموذج حضور الطالب:</b> </span>
                 النموذج الذي يوضح حضور الطالب لدى جهة التدريب طوال الفترة المحددة له، ويعتبر الطالب ناجحاً في هذا المتطلب إذا حقق الحد الأدني لعدد الساعات المطلوبة والتي تقدر بما لا يقل عن 280 ساعة عمل أي ثمانية أسابيع لدى القطاعات الحكومية، أو 280 ساعة عمل أي سبعة أسابيع لدى القطاعات الخاصة.
                </p> </li>
            <li><p>
                    <span style="color: cornflowerblue;"><b> درجة تقييم جهة التدريب:</b> </span>
                	وهو التقييم المعبأ من قبل جهة التدريب، حيث يعتمد على قياس المهارات المكتسبة خلال التدريب والاعتماد على الذات والإلمام بطبيعة العمل المسند له وأنظمته، ويعتبر الطالب ناجحا في التقييم إذا كانت درجاته أكبر من أو يساوي 30 درجة من أصل 50 درجة للتقييم كاملاً.
                </p> </li>
            <li><p>
                    <span style="color: cornflowerblue;"><b> درجة تقييم المشرف على التقرير النهائي للتدريب:</b> </span>
               يقوم المشرف على التدريب بتقييم التقرير النهائي الذي سيقوم الطالب بتسليمه بعد إنتهاء فترة التدريب وهو يعتمد على معايير واضحة تقيس مدى إنجاز الطالب أثناء تدريبه من خلال توثيقه لإنجازاته في جهة التدريب، ويعتبر الطالب ناجحاً في التقرير إذا كانت درجاته أكبر من أو يساوي 30 درجة من أصل 50 درجة لتقييم التقرير كاملاً.
                </p> </li>

        </ol>
        </div>


    </div>

@endsection