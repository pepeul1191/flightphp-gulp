<!-- Inicio CSS Modal-->
<link rel="stylesheet" type="text/css" href="<?php echo Configuration::get('static_url') . $modal_css?>" />
<!-- Fin CSS Modal -->
<script type="text/javascript">
    var DATA_MODAL = <?php if ($data != ''){?>JSON.parse('<?php echo "modal_data";?>')<?php }else{?>''<?php }?>; 
</script>
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $modal_title ?></h4>
      </div>
        <!-- Inicio yield-->
        <?php echo $partial; ?>
        <!-- Fin yield-->
    </div>
</div>
<!-- Inicio JS Modal-->
<script src="<?php echo Configuration::get('static_url') . $modal_js?>" type="text/javascript"></script>
<!-- Fin JS Modal -->