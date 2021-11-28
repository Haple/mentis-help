<?php
include_once 'header.php'
?>
<style>
    #video-grid {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    video {
        height: 300px;
        width: 400px;
        object-fit: cover;
        padding: 8px;
    }

    .main {
        height: 100vh;
        display: flex;
    }

    .main__left {
        flex: 0.8;
        display: flex;
        flex-direction: column;
    }

    .main__right {
        flex: 0.2
    }

    .main__videos {
        flex-grow: 1;
        background-color: black;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px;
    }

    .main__controls {
        background-color: #1C1E20;
    }

    .main__right {
        background-color: #242324;
        border-left: 1px solid #3D3D42;
    }

    .main__controls {
        color: #D2D2D2;
        display: flex;
        justify-content: space-between;
        padding: 5px;
    }

    .main__controls__block {
        display: flex;
    }

    .main__controls__button {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 8px 10px;
        min-width: 80px;
        cursor: pointer;
    }

    .main__controls__button:hover {
        background-color: #343434;
        border-radius: 5px;
    }

    .main__controls__button i {
        font-size: 24px;
    }

    .main__right {
        display: flex;
        flex-direction: column;
    }

    .main__header {
        padding-top: 5px;
        color: #F5F5F5;
        text-align: center;
    }

    .main__chat_window {
        flex-grow: 1;
        overflow-y: auto;
    }

    .messages {
        color: white;
        list-style: none;
    }

    .main__message_container {
        padding: 22px 12px;
        display: flex;
    }

    .main__message_container input {
        flex-grow: 1;
        background-color: transparent;
        border: none;
        color: #F5F5F5;
    }

    .leave_meeting {
        color: #EB534B;
    }

    .unmute,
    .stop {
        color: #CC3B33;
    }
</style>
<div class="cadastro-body p-5">
    <div class="container d-flex justify-content-center">
        <!-- <div id="video-grid"></div> -->

        <div class="main">
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

        </div>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" integrity="sha512-v8ng/uGxkge3d1IJuEo6dJP8JViyvms0cly9pnbfRxT6/31c3dRWxIiwGnMSWwZjHKOuY3EVmijs7k1jz/9bLA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://kit.fontawesome.com/c939d0e917.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script defer src="https://unpkg.com/peerjs@1.2.0/dist/peerjs.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script>
    <?php
    $roomId = $_GET['roomId'];
    echo "var ROOM_ID ='$roomId';";
    ?>
</script>
<script src="../resources/socket.js" defer></script>