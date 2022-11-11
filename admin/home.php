<h1><?php echo $_settings->info('name') ?></h1>
<hr class="border-info">
<div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-train"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Trains</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `train_list` where delete_flag = 0 ")->num_rows;
                ?>
            </span>
            </div>
            
        </div>
        
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-info elevation-1"><i class="fas fa-calendar"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Schedules</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `schedule_list` where `type` = 1 and delete_flag=0 ")->num_rows;
                ?>
            </span>
            </div>
            
        </div>
        
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-calendar-day"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">One-Time Schedules</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `schedule_list` where `type` = 2 and delete_flag=0 ")->num_rows;
                ?>
            </span>
            </div>
           
        </div>
        
    </div>
</div>
<hr>
