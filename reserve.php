<?php
if(isset($_GET['sid'])){
    $trains = $conn->query("SELECT *,Concat(code,' - ',`name`) as train FROM `train_list` where id in (SELECT train_id FROM `schedule_list` where delete_flag = 0 and id='{$_GET['sid']}')");
    $res = $trains->fetch_all(MYSQLI_ASSOC);
    $train_fcf_arr = array_column($res,'first_class_capacity','id');
    $train_ef_arr = array_column($res,'economy_capacity','id');
    $train_arr = array_column($res,'train','id');
    $qry = $conn->query("SELECT * from `schedule_list` where delete_flag = 0 and id='{$_GET['sid']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
                $$k = $v;
        }
    }else{
    echo '<script> alert("Unkown Schedule ID.");location.replace("./?page=schedules") </script>';
    }
} else{
    echo '<script> alert("Schedule ID is required to view this page.");location.replace("./?page=schedules") </script>';
}

?>
<div class="content py-5" >
    <div class="card rounded-0 card-outline card-primary shadow" style="border: none;">
        <div class="card-header rounded-0" style="box-shadow: 1px 1px 5px black;">
            <h5 class="card-title" style="font-weight: bold;">Reservation</h5>
        </div>
        <div class="card-body rounded-0" style="box-shadow: 1px 1px 5px black;">
            <div class="callout border-primary rounded-0" style="border: none;">
                <div class="row" >
                    <div class="col-md-4 col-sm-6" >
                        <dl >
                            <dt class="text-muted" >Train No.</dt>
                            <dd class="pl-3"><b><?= isset($code) ? $code : 'N/A' ?></b></dd>
                            <dt class="text-muted">Schedule:</dt>
                            <dd class="pl-3"><b><?= isset($date_schedule) && !is_null($date_schedule) ? date("M d, Y", strtotime($date_schedule)) : "Everday" ?> <?= isset($time_schedule) ? date("h:i A", strtotime($time_schedule)) : "--:-- --" ?></b></dd>
                        </dl>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <dl>
                            <dt class="text-muted">From:</dt>
                            <dd class="pl-3"><b><?= isset($route_from) ? $route_from : "N/A" ?></b></dd>
                            <dt class="text-muted">To:</dt>
                            <dd class="pl-3"><b><?= isset($route_to) ? $route_to : "N/A" ?></b></dd>
                        </dl>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <dl>
                            <dt class="text-muted">First Class:</dt>
                            <dd class="pl-3"><b><?= isset($first_class_fare) ? $first_class_fare : '--.--' ?></b></dd>
                            <dt class="text-muted">Economy:</dt>
                            <dd class="pl-3"><b><?= isset($economy_fare) ? $economy_fare : "--.--" ?></b></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <hr>
            <form action="" id="reserve-form">
                <input type="hidden" name="schedule_id" value=<?= isset($id) ? $id : "" ?>>
                <input type="hidden" name="time" value=<?= isset($time_schedule) ? $time_schedule : "" ?>>
                <div class="form-group col-md-4 col-sm-6 <?= isset($date_schedule) && !is_null($date_schedule) ? 'd-none' : '' ?>">
                    <label for="date" class="form-group">Date:</label>
                    <input class="form-control form-control-sm rounded-0" type="date" name="date" id="date" required value="<?= isset($date_schedule) && !is_null($date_schedule) ? $date_schedule : '' ?>" min="<?= date("Y-m-d") ?>">
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <select class="form-control form-control-sm form-control-border" name="seat_type" required>
                                <option value="" disabled selected>Select Class</option>
                                <option value="1">First Class</option>
                                <option value="2">Economy</option>
                            </select>
                            <small class="text-muted mx-2">Seat Type</small>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm form-control-border text-right" name="fare_amount" readonly>
                            <small class="text-muted mx-2">Amount</small>
                        </div>
                    </div>
                </div> 
                <!-- List Group -->
                <div class="list-group" id="reserve-field">
                    <div class="list-group-item border reserve-item">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm form-control-border" name="firstname[]" required>
                                    <small class="text-muted mx-2">First Name</small>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm form-control-border" name="middlename[]" placeholder="(optional)">
                                    <small class="text-muted mx-2">Middle Name</small>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm form-control-border" name="lastname[]" required>
                                    <small class="text-muted mx-2">Last Name</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group text-right">
                                    <button style="background-color: red; border: none; border-radius: 5px;" class="btn btn-danger btn-sm btn-flat btn-remove" type="button"><i class="fa fa-trash"></i> Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between my-2">
                    <div class="form-group">
                        <button class="btn btn-sm btn-info btn-flat" type="button" style="background-color: #153462; border: none; border-radius: 5px; box-shadow: 1px 1px 5px black;" id="add_item"><i class="fa fa-plus"></i> Add Passenger</button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary btn-flat" style="background-color: #153462; border: none; border-radius: 5px; box-shadow: 1px 1px 5px black; font-weight: bold;">Submit Reservation</button>
                    </div>
                </div>
                <!-- List Group -->

            </form>
        </div>
    </div>
</div>

<script>
   function remove_passenger($this){
       if($('.reserve-item').length == 1){
           alert("Can't Remove Passenger details. Reservation form requires atleast 1 passenger.")
           return false;
       }
        $this.closest('.reserve-item').remove()
   }
   $(function(){
       $('[name="seat_type"]').change(function(){
            var type = $(this).val()
            if(type == 1){
                $('[name="fare_amount"]').val('<?= $first_class_fare ?>')
            }else{
                $('[name="fare_amount"]').val('<?= $economy_fare ?>')
            }
       })
       $('.btn-remove').click(function(){
            remove_passenger($(this))
        })
       $('#add_item').click(function(){
           var item = $('.reserve-item').first().clone();
            item.find('input').val('')
            $('#reserve-field').append(item)
            item.find('.btn-remove').click(function(){
                remove_passenger($(this))
            })
       })


        $('#reserve-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.pop-msg').remove()
            var el = $('<div>')
                el.addClass("pop-msg alert")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_reservation",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
                success:function(resp){
                    if(resp.status == 'success'){
                        // alert_toast("Success",'success')
                        location.href = "./?page=tickets&ids="+resp.ids
                    }else if(!!resp.msg){
                        el.addClass("alert-danger")
                        el.text(resp.msg)
                        _this.prepend(el)
                    }else{
                        el.addClass("alert-danger")
                        el.text("An error occurred due to unknown reason.")
                        _this.prepend(el)
                    }
                    el.show('slow')
                    $('html,body').animate({scrollTop:0},'fast')
                    end_loader();
                }
            })
        })

   })
    
</script>