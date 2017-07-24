<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src='https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js'></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/tinymce/tinymce.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
//datatables
table = $('#table_article').DataTable({
	responsive: true,
"processing": true, //Feature control the processing indicator.
"serverSide": true, //Feature control DataTables' server-side processing mode.
"order": [],
// Load data for the table's content from an Ajax source
"ajax": {
	url: "<?php echo base_url("admin/article_list");?>",
	type: "POST"
},

});
} );

function reload_table()
{
table.ajax.reload(null,false); //reload datatable ajax
}

function delete_Article(id)
{
	$.confirm({
		icon: 'glyphicon glyphicon-trash',
		title: 'Delete Data',
		theme: 'light',
		type: 'red',
		animationBounce: 2.5,
		buttons: {
			YES: function(){
				$.ajax({
					url : "<?php echo site_url('admin/delete_Article')?>/"+id,
					type: "POST",
					dataType: "JSON",
					success: function(data)
					{
//if success reload ajax table
reload_table();
},
error: function (jqXHR, textStatus, errorThrown)
{
	alert('Error deleting data');
}
});

			},
			NO: {
				action: function(){
				}
			}
		}
	});
}
</script>
<script type="text/javascript">
	tinymce.init({
		selector: "textarea",
		height: 500,
		theme: 'modern',
		plugins: [
		'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		'searchreplace wordcount visualblocks visualchars code fullscreen',
		'insertdatetime media nonbreaking save table contextmenu directionality',
		'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
		],
		toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
		image_advtab: true,
		templates: [
		{ title: 'Test template 1', content: 'Test 1' },
		{ title: 'Test template 2', content: 'Test 2' }
		],
		content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		'//www.tinymce.com/css/codepen.min.css'
		]
	});
</script>
</body>
</html>