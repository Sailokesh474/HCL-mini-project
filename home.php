<style>
    .car-cover{
        width:10em;
    }
    .car-item .col-auto{
        max-width: calc(100% - 12em) !important;
    }
    .car-item:hover{
        transform:translate(0, -4px);
        background:#a5a5a521;
    }
    .banner-img-holder{
        height:25vh !important;
        width: calc(100%);
        overflow: hidden;
    }
    .banner-img{
        object-fit:scale-down;
        height: calc(100%);
        width: calc(100%);
        transition:transform .3s ease-in;
    }
    .car-item:hover .banner-img{
        transform:scale(1.3)
    }
    .welcome-content img{
        margin:.5em;
        
    }
    .container-fluid{
        background-color: #F6F6C9;
    }
</style>
<div class="col-lg-12 py-5">
    <div class="contain-fluid">
        <div class="card card-outline card-dark shadow rounded-0" style="border: none;">
            <div class="card-body rounded-0" style="background-color: #F6F6C9; border-radius: 5px;
        box-shadow: 1px 1px 5px black;">
                <div class="container-fluid">
                    <h3 class="text-center">Welcome</h3>
                    <hr>
                    <div class="welcome-content">
                        <?php include("welcome.html") ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>