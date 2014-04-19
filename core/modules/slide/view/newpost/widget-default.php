<div class="row">
  <div class="col-md-12">
    <div style="font-size:45px;">Nuevo Slidle</div>    
  </div>
</div>
<form enctype="multipart/form-data" class="form-horizontal" method="post" action="index.php?view=addpost" role="form">
<div class="row">
	<div class="col-md-3">
<br>  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Tema</label>
    <div class="col-lg-10">
<select class="form-control input-lg" name="theme_id" id="theme_id">
<?php
$themes = ThemeData::getAll();

foreach($themes as $theme){
  ?>
  <option value="<?php echo $theme->id; ?>"><?php echo $theme->name; ?></option>
  <?php
}

?>
</select>

<script>
i = 0;
themes = Array("a", Array("a"));
<?php foreach ($themes as $theme): ?>
themes[i] = Array("<?php echo $theme->header_background_color; ?>","<?php echo $theme->body_background_color; ?>","<?php echo $theme->header_text_color; ?>","<?php echo $theme->body_text_color; ?>");
i++;

<?php endforeach; ?>
</script>

<script>
  $("#theme_id").change(function(){
    ix = $("#theme_id").val();
    console.log( ix-1);
    console.log(themes[ix-1]);
    t= themes[ix-1];
    $("#sl-title").css("background",t[0]);
    $("#i-titulo").css("background",t[0]);
    $("#i-titulo").css("color",t[2]);
    $("#sl-content").css("background",t[1]);
    $("#i-content").css("background",t[1]);
    $("#i-content").css("color",t[3]);
  });
</script>


    </div>
  </div>



  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_public"> Publicar este slidle
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input type="hidden" name="view" value="addpost">
      <button type="submit" class="btn btn-success btn-block btn-lg"><i class="glyphicon glyphicon-send"></i> Slidle It</button>
    </div>
  </div>

	</div>
	<div class="col-md-9">
<div class="sl-title" id="sl-title" style="padding:20px;background:white;">
  <div class="form-group">
    <div class="col-lg-12">
      <input type="text" class="form-control input-lg" name="title" id="i-titulo" placeholder="Escribe un titulo" autocomplete="false">
    </div>
  </div>
</div>
<div class="sl-content" id="sl-content" style="padding:20px;background:white;">
  <div class="form-group">
    <div class="col-lg-12">
    	<textarea name="content" id="i-content"  class="form-control input-lg" placeholder="Escriba el contenido de el Slidle." style="height:200px;" required></textarea>
    </div>
  </div>
</div>
<br>  <div class="form-group">
    <div class="col-lg-12">
  <input class="wide file input" id="image" type="file" name='image' placeholder="Distintiva" />
    </div>
  </div>


	</div>
</div>
<br><br><br><br><br><br><br><br>
</form>
