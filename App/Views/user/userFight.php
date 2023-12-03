<link href="http://<?php echo APP_HOST; ?>/public/css/user-fight.css" rel="stylesheet">

<body>
  <div class="container">
    <aside>
    </aside>
    <section>
      <div class="list">
        <div class="list-item pb-9">
          <div class="liquid">
            <h2>THE MOST LIKED</h2>
          </div>
        </div>
        <button>
          <img src="/public/images/icons/infoIcon.png" style="height: 32px; width: 32px;" alt="" />
        </button>
      </div>

      <div class="box">
        <div class="ranking-most-liked">
          <div class="user-ranking">
            <div class="point">
              <span>3</span>
              <img src="/public/images/userFight/blackLike.png" style="width: 25px; height: 25px;" />
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative;">
              <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">

                <img src="/public/images/users/undertale.jpg" class="user-icon" style="height: 90px; width: 90px;" alt="" />

                <img src="/public/images/userFight/position3.png" alt="" style="position: absolute; left: -20px; top: 10px; width: 80px; height: 80px;" />
              </div>
              <div class="bar" style="height: 300px;"></div>
              <div class="user-name">
                rodolfo#2714
              </div>
            </div>
          </div>
          <div class="user-ranking">
            <div class="point">
              <span>5</span>
              <img src="/public/images/userFight/blackLike.png" style="width: 25px; height: 25px;" />
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative;">
              <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">

                <img src="/public/images/users/pacman.jpg" class="user-icon" style="height: 90px; width: 90px;" alt="" />

                <img src="/public/images/userFight/position1.png" alt="" style="position: absolute; left: 45px; top: 35px; width: 80px; height: 80px;" />
              </div>



              <div class="bar" style="height: 300px;"></div>
              <div class="user-name one">
                crazyModel#2063
              </div>
            </div>


          </div>


          <div class="user-ranking">
            <div class="point">
              <span>4</span>
              <img src="/public/images/userFight/blackLike.png" style="width: 25px; height: 25px;" />
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative;">
              <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <img src="/public/images/users/sonic2.jpg" class="user-icon" style="height: 90px; width: 90px;" alt="" />
                <img src="/public/images/userFight/position2.png" alt="" style="position: absolute; left: -20px; top: 32px; width: 80px; height: 80px;" />
              </div>
              <div class="bar" style="height: 300px;"></div>
              <div class="user-name">
                gabrela#3891
              </div>
            </div>


          </div>



        </div>

        <div class="icons">
          <img src="/public/images/gifs/heartMinecraft.gif" alt="" style=" height: 40px; width: 140px;" />
          <img src="/public/images/gifs/fantasminha.gif" alt="" style=" height: 100px; width: 150px;" />
        </div>

        <div class="user-ranking" style="height: auto;">
          <div></div>
          <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative;">
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">

              <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>" style="height: 70px; width: 70px; border-radius: 100%" alt="" />

              <img src="/public/images/userFight/yellowStar.png" alt="" style="width: 80px; height: 80px; position: absolute; left: -40px; top: 10px;" />
            </div>
            <div class="bar" style="height: 100px;"></div>
            <div class="user-name">
              Me
            </div>
          </div>
        </div>
      </div>
      <div class="texts-container">
        <p>How many friends this guys have? Alexa, search please: How to become</p>
        <h2>THE MOST LIKED.</h2>
        <p>But really, how so many? Where can i find it?</p>
      </div>
      <div class="list">
        <div class="list-item pb-9">
          <div class="liquid">
            <h2>THE MOST AWARDED</h2>
          </div>
        </div>
        <button>
          <img src="/public/images/icons/infoIcon.png" style="height: 32px; width: 32px;" alt="" />
        </button>
      </div>


      <div class="box-awared">
        <div class="wrapper-awared">

          <div class="card-user-awared" style="max-width: 70%;">
            <h1>gabrela#3891</h1>
            <div class="trofeu-card ">
              <span>2</span>
              <img src="/public/images/userFight/blackAward.png" alt="" style="height: 16px; width: 16px;" />
            </div>
            <div class="container-image-awared">
              <img src="/public/images/users/sonic2.jpg" style="height: 100px; width: 100px; border-radius: 100%;" alt="" />
            </div>

            <div class="start">
              <img src="/public/images/userFight/position1.png" style="width: 80px; height: 80px;" alt="" />
            </div>
          </div>

          <div class="card-user-awared" style="max-width: 60%;">
            <h1>crazyModel#2063</h1>
            <div class="trofeu-card ">
              <span>1</span>
              <img src="/public/images/userFight/blackAward.png" alt="" style="height: 16px; width: 16px;" />

              <div class="container-image-awared">
                <img src="/public/images/users/pacman.jpg" style="height: 100px; width: 100px; border-radius: 100%;" alt="" />
              </div>

              <div class="start">
                <img src="/public/images/userFight/position2.png" alt="" style="width: 80px; height: 80px; " />
              </div>
            </div>
          </div>


          <div class="card-user-awared" style="max-width: 50%;">
            <h1>robert#3424</h1>
            <div class="trofeu-card ">
              <span>0</span>
              <img src="/public/images/userFight/blackAward.png" alt="" style="height: 16px; width: 16px;" />
            </div>
            <div class="container-image-awared">

              <img src="/public/images/users/amongus.jpg" style="height: 100px; width: 100px; border-radius: 100%;" alt="" />


            </div>
            <div class="start">
              <img src="/public/images/userFight/position3.png" alt="" style="width: 80px; height: 80px; " />
            </div>

          </div>

          <div class="card-user-awared" style="max-width: 40%;">
            <h1>Barbs#0847</h1>
            <div class="trofeu-card ">
              <span>0</span>

              <img src="/public/images/userFight/blackAward.png" alt="" style="height: 16px; width: 16px;" />

              <div class="container-image-awared">

                <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>" style="height: 100px; width: 100px; border-radius: 100%" alt="" />
              </div>
              <div class="start">
                <img src="/public/images/userFight/yellowStar.png" alt="" style="width: 80px; height: 80px; " />
              </div>
            </div>
          </div>
        </div>
      </div>





      <div class="texts-container" style="text-align: center;">
        <p>
          Do you want to become <span>THE MOST AWARDED</span>
        <p> and have all the cool icons in your profile? Jesus, enjoy us in ours challenges, you’re gonna love
          it</p>
        </p>
      </div>
      <div class="list">
        <div class="list-item pb-9">
          <div class="liquid">
            <h2>THE TRY HARDER</h2>
          </div>
        </div>
        <button>
          <img src="/public/images/icons/infoIcon.png" style="height: 32px; width: 32px;" alt="" />
        </button>
      </div>

      <div class="box-custom">
        <div class="ranking-most-liked-custom">
          <div class="user-try-harder">
            <h2>Barbs#0847</h2>
            <img src="./avatar.svg" style="height: 70px; width: 70px;" class="user-icon" alt="" />
            <img class="level-try-harder" src="/public/images/icons/levelStarIcon.png" alt="" />
          </div>


          <div class="user-try-harder">
            <h2>crazyModel#2063</h2>
            <img src="./avatar.svg" style="height: 70px; width: 70px;" class="user-icon" alt="" />
            <img class="level-try-harder" src="/public/images/icons/levelStarIcon.png" alt="" />
          </div>


          <div class="user-try-harder">
            <h2>Barbs#0847</h2>
            <img src="./avatar.svg" style="height: 70px; width: 70px;" class="user-icon" alt="" />
            <img class="level-try-harder" src="/public/images/icons/levelStarIcon.png" alt="" />
          </div>
        </div>
        <div class="sonic-container">
          <div style="display: flex; align-items: end; gap: 16px;">
            <h2>YOU HERE SIR <img src="/public/images/playButton.png" /></h2>
            <div>
              <p>position #19</p>
              <img class="user-icon" src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>" style="height: 70px; width: 70px;" alt="" />
            </div>
          </div>

          <img src="/public/images/gifs/sonic.gif" alt="" />
        </div>
      </div>

      <div class="texts-container" style="text-align: center;">
        <p>
          Wishing to become <span>THE MOST AWARDED</span> here on the server?
        <p> C’mon, you can do it. Find the little details, fill the void, fight and fight. I don’t know what I’m saying.</p>
        </p>
      </div>








    </section>
  </div>


</body>

</html>