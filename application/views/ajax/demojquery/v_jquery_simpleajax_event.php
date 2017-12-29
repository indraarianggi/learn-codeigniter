<!-- View 61 : AJAX Sederhana dengan jQuery -->

<script type="text/javascript">
	$(document).ready(function() {
		$("#ajaxload").click(function() {
			$("#teks").load("<?= site_url('ajax/c_jquery/simpleload'); ?>")
		});

		$("#ajaxajax").click(function() {
			$.ajax({
				url : '<?= site_url('ajax/c_jquery/ajaxajax') ?>', 
				success : function(data) {
					$('#teks').html(data);
				}
			});
		});
	});
</script>