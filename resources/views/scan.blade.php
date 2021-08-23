@extends('layouts.app')
@section('head')
@endsection
@section('content')
<video id="preview" style="width:100%; height:275px;border:1px solid #CCC; margin-bottom: 15px"></video>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>


<script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview'),mirror: false });
      scanner.addListener('scan', function (content) {
          console.log(content);
		  <!-- $("#_qr_content").html(content); -->
		  document.getElementById("_qr_content").innerHTML = content;
          alert("QR GET!");
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 1) {
          scanner.start(cameras[1]);
        } else {
          <!-- console.error('No cameras found.'); -->
		  scanner.start(cameras[0]);
        }
      }).catch(function (e) {
        console.error(e);
      });
</script>
@endsection