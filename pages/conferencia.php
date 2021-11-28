<?php
include_once 'header.php'
?>
<style>
    #video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, 300px);
        grid-auto-rows: 300px;
    }

    video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
<div class="cadastro-body p-5">
    <div class="container d-flex justify-content-center">
        <div id="video-grid"></div>

        <!-- <div class="main">
            <div class="main__left">
                <div class="main__videos">
                    <div id="video-grid">

                    </div>
                </div>
                <div class="main__controls">
                    <div class="main__controls__block">
                        <div onclick="muteUnmute()" class="main__controls__button main__mute_button">
                            <i class="fas fa-microphone"></i>
                            <span>Mute</span>
                        </div>
                        <div onclick="playStop()" class="main__controls__button main__video_button">
                            <i class="fas fa-video"></i>
                            <span>Stop Video</span>
                        </div>
                    </div>
                </div>
            </div>

        </div> -->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
</script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.socket.io/4.4.0/socket.io.min.js" integrity="sha384-1fOn6VtTq3PWwfsOrk45LnYcGosJwzMHv+Xh/Jx5303FVOXzEnw0EpLv30mtjmlj" crossorigin="anonymous"></script>

<script>
    <?php
    $roomId = $_GET['roomId'];
    echo "var ROOM_ID ='$roomId';";
    ?>
</script>
<script src="https://kit.fontawesome.com/c939d0e917.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script defer src="https://unpkg.com/peerjs@1.2.0/dist/peerjs.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="../resources/socket.js" defer></script>