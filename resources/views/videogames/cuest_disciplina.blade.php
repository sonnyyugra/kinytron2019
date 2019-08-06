<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Unity WebGL Player | Cuestionario Disciplina</title>
    <link rel="shortcut icon" href="{{asset('videogames/Kinytron_Disciplina/TemplateData/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('videogames/Kinytron_Disciplina/TemplateData/style.css')}}">
    <script src="{{asset('videogames/Kinytron_Disciplina/TemplateData/UnityProgress.js')}}"></script>  
    <script src="{{asset('videogames/Kinytron_Disciplina/Build/UnityLoader.js')}}"></script>
    <script>
      var gameInstance = UnityLoader.instantiate("gameContainer", "videogames/Kinytron_Disciplina/Build/Kinytron_Disciplina.json", {onProgress: UnityProgress});
    </script>
  </head>
  <body>
    <div class="webgl-content">
      <div id="gameContainer" style="width: 960px; height: 600px"></div>
      <div class="footer">
        <div class="webgl-logo"></div>
        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
        <div class="title">Cuestionario Disciplina</div>
      </div>
    </div>
  </body>
</html>