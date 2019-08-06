<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Unity WebGL Player | Cuestionario Empatia</title>
    <link rel="shortcut icon" href="{{asset('videogames/Kinytron_Empatia/TemplateData/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('videogames/Kinytron_Empatia/TemplateData/style.css')}}">
    <script src="{{asset('videogames/Kinytron_Empatia/TemplateData/UnityProgress.js')}}"></script>  
    <script src="{{asset('videogames/Kinytron_Empatia/Build/UnityLoader.js')}}"></script>
    <script>
      var gameInstance = UnityLoader.instantiate("gameContainer", "videogames/Kinytron_Empatia/Build/Kinytron_Empatia.json", {onProgress: UnityProgress});
    </script>
  </head>
  <body>
    <div class="webgl-content">
      <div id="gameContainer" style="width: 960px; height: 600px"></div>
      <div class="footer">
        <div class="webgl-logo"></div>
        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
        <div class="title">Cuestionario Empatia</div>
      </div>
    </div>
  </body>
</html>