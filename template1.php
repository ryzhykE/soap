<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>SOAP</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <style>
        .border-coll {
            border: 1px solid red;
            padding-top: 10px;
            padding-bottom: 5px;
        }
        li {
            height: 50px;
        }
        li p {
            text-align: center;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <h3>AllCards</h3>
        <?if(isset($footbool)):?>
<?
foreach($footbool->children('m',true)->children('m',true) as $val):?>
                <div class="col-md-3 border-coll">
                    <p>Player - <b><? echo $val->sPlayerName;?></b></p>
                    <p>Date - <b><? echo $val->dGame;?></b></p>
                    <p>Minte - <b><? echo $val->iMinute;?></b></p>
                    <p>Team1 - <b><? echo $val->sGameTeam1;?></b> <img src="<? echo $val->sGameTeam1Flag;?>"> </p>
                    <p>Team2 - <b><? echo $val->sGameTeam2;?></b> <img src="<? echo $val->sGameTeam2Flag;?>"></p>
                </div>
            <? endforeach;?>
        <?endif;?>
    </div>
</div>
 <div>
            <form method="post">
                <input type="text" name="dateCurs" placeholder="2017-09-26">
                <button type="submit">get curs</button>
            </form>
        </div>

 <?if(isset($bank)):?>
            <?foreach($bank  as $val):?>
                <div class="col-md-3 border-coll">
                    <ul class="list-group">
                        <li class="list-group-item"><p>Name - <b><? echo $val->Vname;?></b></p></li>
                        <li class="list-group-item"><p>Curse - <b><? echo $val->Vcurs;?></b></p></li>
                        <li class="list-group-item"><p>Code - <b><? echo $val->VchCode;?></b></p></li>
                    </ul>
                </div>
            <?endforeach;?>
        <?endif;?>






    </div>
</div>
</body>
</html>
