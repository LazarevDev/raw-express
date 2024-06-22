<div class="profileTop">
    <div class="profilePhoto">
        <img src="../img/icons/user.png" alt="">
    </div>

    <div class="profileTopContent">
        <div class="profileTitle">
            <h2><?=Yii::$app->user->identity->username?></h2>
            <p>Роль: <?php
            if(array_key_exists("admin", Yii::$app->authManager->getRolesByUser(Yii::$app->user->id)) == true){
                echo "admin";
            }else{
                echo "user";
            } ?></p>
        </div>

        <div class="profileLogout">
            <a href="../site/logout">Выйти</a>
        </div>
    </div>
</div>