<!-- View 65 : AJAX CRUD -->

<?php

echo heading($title, 2);

echo form_open($scriptaksi);
	echo form_label("No Teman : ");
		if($aksi!="add") {
			echo form_hidden($noteman["name"], $noteman["value"]).$noteman["value"];
		}
		else {
			echo form_input($noteman);
		}
		echo br();
		echo form_label("Nama Teman : ");
		echo form_input($namateman);
		echo br();
		echo form_label("No Telepon : ");
		echo form_input($notelp);
		echo br();
		echo form_label("Email : ");
		echo form_input($email);
		echo br();
		echo form_submit("btnSimpan", "$aksi");
	echo form_close();

?>

<script type="text/javascript">
	$(document).ready(function() {
		$("form").submit(function() {
			vardata = $("form").serialize(); // membaca dala form dengan serialize() [?]

			$.ajax({
				url : '<?=site_url("$scriptaksi"); ?>',
				type : 'POST',
				data : vardata,
				success : function(data) {
					alert(data);
					$("#datateman").load("<?= site_url('ajax/c_jquery/crudbrowse'); ?>");
				}
			});
			// alert("submitted! "+vardata);
			return false; // return false untuk mencegah reload halaman
		});
	});
</script>