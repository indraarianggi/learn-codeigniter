<!-- View 63 : AJAX CRUD -->

<script type="text/javascript">
	$(document).ready(function() {
		$("#datateman").load("<?= site_url('ajax/c_jquery/crudbrowse'); ?>");

		$("#crudadd").click(function() {
			$("#datateman").load("<?= site_url('ajax/c_jquery/crudadd'); ?>");
		});

		$("#crudbrowse").click(function() {
			$("#datateman").load("<?= site_url('ajax/c_jquery/crudbrowse'); ?>")
		});
	});
</script>