<?php 
include('master/header.php');
include('php/pages/shows.php');
 ?>

        <div class="tm-blog-img-container">
            
        </div>

        <section class="tm-section">
            <div class="container">
                <div class="row" style="margin:20px 0;">
                    <div class="col-xs-12">
                        Please select a show to edit.
                    </div>
                </div>
                <div class="row tm-gold-text text-center">

                    <div class="col-xs-4">
                        <h3 class="header">Shows</h3>
                        <div class="row tm-gold-text-imp" style="margin: 10px 0;">
                            <a href="show-edit.php?ShowId=-1">
			                        <div class="col-xs-8">
                                        Add A New Show
                                    </div>
                                    <div class='col-xs-4'>
                                    <div class="btn btn-success"  style="padding:2px 8px;">
                                    <i class="fa fa-plus" aria-hidden="true"></i></div>
			                        </div>
                            </a>
		        </div>
                        <?php echo $showsHTML; ?>

                        <div class="row tm-gold-text-imp" style="margin: 10px 0;">
                            <a href="shows-edit.php?ShowId=-1">
			                        <div class="col-xs-8">
                                        Add A New Show
                                    </div>
                                    <div class='col-xs-4'>
                                    <div class="btn btn-success"  style="padding:2px 8px;">
                                    <i class="fa fa-plus" aria-hidden="true"></i></div>
			                        </div>
                            </a>
		                </div>
                    </div>

                </div>
                
            </div>
        </section>


<div class="modal fade" id="deleteShowModal" tabindex="-1" role="dialog" aria-labelledby="deleteShowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteShowModalLabel">Delete Show</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this show? Once complete this operation cannot be undone!
            </div>
            <div class="modal-footer">
                <a id="showdel" href="php/actions/show-delete.php" class="btn btn-danger">Yes, Delete This Show</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
$(function(){
    $(document).on("click", ".showdel", function () {
        var showDel = $(this).data('id');
        var href = $("#showdel").attr("href");
        $("#showdel").attr("href", href + '?ShowId=' + showDel);
    });

    $('#show-search').on('keyup', function() {
        let items = $('.show-search');
        let searchVal = $('#show-search').val().toLowerCase();

        if(searchVal == ''){
            $('.show-search').css('display', 'block');
        }else{
            $('.show-search').each(function(i,e){
                thisVal = $(this).first('div').html().toLowerCase();
                if(thisVal.includes(searchVal)){
                    $(this).css('display', 'block');
                }else {
                    $(this).css('display', 'none');
                }
            });
        }
    });
});
</script>


<?php include('master/footer.php'); ?>
