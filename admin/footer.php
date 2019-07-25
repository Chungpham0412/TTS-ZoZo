
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
</body>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="tinymce/tinymce.min.js"></script>
<script src="tinymce/config.js"></script>
<script src="public/js/adminlte.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(document).ready(function(){
		$('input#add_img').change(function(){
			var _file = $(this).prop('files');

			if(_file && _file[0]){
				var _reader = new FileReader();
				_reader.onload = function(e){
					var _img = e.target.result;
					$('img#show_img').attr('src',_img);
				}
				_reader.readAsDataURL(_file[0]);
			}
		})
	})
	$('input#add_img_else').change(function(){
      var _file = $(this).prop('files');
      
      if (_file) {
       
        for (var i = 0; i < _file.length; i++) {
          let _reader = new FileReader();

          _reader.onload = function(e){

            var _img_src = e.target.result;
            var img = document.createElement("img");
                img.className = "col-md-3 thumbnail";
                img.src = _img_src;
                $('#show_img_else').append(img);
          }
        _reader.readAsDataURL(_file[i]);
        }
      }
    })
});
</script>
</body>
</html>