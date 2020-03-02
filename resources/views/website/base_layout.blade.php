<!DOCTYPE html>
<html lang="ar" dir="rtl" >
<head>
    <meta charset="UTF-8">
    <title>IUG Training</title>
    <!-- Bootstrap core CSS → !-->
    @includeIf('website.header.header_meta')
    @yield('style')
</head>
<body>
<div class="container-fluid">
    @includeIf('website.header.header')
    @yield('content')

</div>

@includeIf('website.footer.footer')
@yield('script')
@includeIf('website.footer.footer_meta')
</body>
</html>