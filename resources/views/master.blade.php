<!doctype html>
<!--suppress ALL -->
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Font awesome  --}}
    <script src="https://kit.fontawesome.com/f94a759298.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @livewireStyles
    <title>Livewire-CRUD</title>
</head>

<body>
    <div class="container">
        <livewire:nav />
        @yield('body')
        <footer class="mt-5">
            <div class="d-flex justify-content-between py-4 my-4 border-top">
                <p>&copy; 2023 Sufia TheSecureDev. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                  <li class="ms-3">  <a  class="link-dark " href="https://www.youtube.com/@Sufia-TheSecureDev" target="_blank"><i class="fa-brands fa-square-youtube"></i></a></li>
                  <li class="ms-3"><a class="link-dark" href="https://web.facebook.com/SufiaTheSecureDev" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                  <li class="ms-3"><a class="link-dark  "  href="https://www.linkedin.com/in/sufia-akter-1b4689177/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                </ul>
              </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @livewireScripts
</body>

</html>
