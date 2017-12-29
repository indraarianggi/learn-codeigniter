<!-- View 59 : Web Sederhana dengan JSuqry -->

<script type="text/javascript">
	$(document).ready(function() {
		$("#teks").hide();
		$("#showme").click(function() {
			$("#teks").show("slow");
		});
		$("#hideme").click(function() {
			$("#teks").hide("slow");
		});
	});
</script>