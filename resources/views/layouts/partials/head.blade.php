{{-- fonts --}}
<link href="{{mix('css/app.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Caramel&family=Dancing+Script:wght@700&family=Lobster&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poiret+One&family=Poppins:wght@900&family=Quicksand:wght@500&display=swap" rel="stylesheet">
{{-- end fonts --}}


{{-- first style --}}
<style type="text/css">
@font-face {
  font-family: "SpringSakura";
  src: local("SpringSakura"), url("https://codesyariah122.github.io/assets/fonts/SpringSakura-3z1m8.woff") format("woff");
}
@font-face {
  font-family: "Reey Regular";
  src: local("Reey Regular"), url("https://codesyariah122.github.io/assets/fonts/Reey-Regular.woff") format("woff");
}
@font-face {
 font-family: 'Walkway';
 src:  url("{{asset('fonts/walkway/Walkway.ttf.woff')}}") format("woff");
 font-weight: normal;
 font-style: normal;
}
*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
}
body{
  background-color: #fff!important;
}
.underline:after{
  content: '';
  display: block;
  margin: auto;
  margin-top: 15px;
  position: relative;
  margin-bottom:2rem;
  width: 100px;
  height: 2px;
  background:rgb(255, 99, 78);
}
@media only screen and (max-device-width: 812px) {
  body{
    width: 100%!important;
  }
}
</style>