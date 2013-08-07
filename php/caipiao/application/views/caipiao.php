<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
    
    <?php if(!empty($rand)):?>
    <h1>随机数据</h1>
    <table style="text-align:center">
        <tr>
            <?php foreach ($rand as $key => $value) { ?>
            <th style="width:20px;"><?php echo $value?></th>
            <?php } ?>        
        </tr>
    </table>
    <?php endif?>
    
    <?php if(!empty($pastPrice)):?>
    <h1>随机数据的往期中奖结果</h1>
    <table style="text-align:center">
        <?php foreach ($pastPrice as $key => $row) { ?>
        <tr>
            <?php foreach ($row['old']['red'] as $key => $value) { ?>
                <?php if(in_array($value, $row['red'])){?>
                <td style="width:20px;color:#FF0000;"><?php echo $value?></td>
                <?php }else{?>
                <td style="width:20px;;"><?php echo $value?></td>
                <?php }?>
            <?php } ?>
            
            <?php if($row['old']['blue'] == $row['blue']){?>
            <td style="width:20px;color:#0000FF;"><?php echo $row['old']['blue']?></td>
            <?php }else{?>
            <td style="width:20px;"><?php echo $row['old']['blue']?></td>
            <?php }?>
            <td style="width:20px;"><?php echo $row['old']['date']?></td>
        </tr>
        <?php } ?>
    </table>
    <?php endif?>
    
    <?php if(!empty($statistics['red'])):?>
    <h1 style="color:#FF0000;">统计红球出现次数</h1>
    <table style="text-align:center">
        <tr>
            <?php foreach ($statistics['red'] as $key => $value) { ?>
            <th style="width:20px;color:#FF0000;"><?php echo $key?></th>
            <?php } ?>
        </tr>
        <tr>
            <?php foreach ($statistics['red'] as $key => $value) { ?>
            <td style="width:20px;"><?php echo $value?></td>
            <?php } ?>        
        </tr>
    </table>
    <?php endif?>
    
    <?php if(!empty($statistics['blue'])):?>
    <h1 style="color:#0000FF;">统计蓝球出现次数</h1>
    <table style="text-align:center">
        <tr>
            <?php foreach ($statistics['blue'] as $key => $value) { ?>
            <th style="width:20px;color:#0000FF;"><?php echo $key?></th>
            <?php } ?>
        </tr>
        <tr>
            <?php foreach ($statistics['blue'] as $key => $value) { ?>
            <td style="width:20px;"><?php echo $value?></td>
            <?php } ?>        
        </tr>
    </table>
    <?php endif?>
    
    <?php if(!empty($result)):?>
    <h1>最近N期数据</h1>
    <table>
        <tr>
	        <th>id</th>
	        <?php foreach ($redIndex as $key => $value) { ?>
            <th style="width:20px;color:#FF0000;"><?php echo $key?></th>
            <?php } ?>
	        <?php foreach ($blueIndex as $key => $value) { ?>
            <th style="width:20px;color:#0000FF;"><?php echo $key?></th>
            <?php } ?>
            <th>date</th>
        </tr>
        <?php foreach ($result as $row):?>
        <tr style="text-align:center">
            <td><?php echo $row['id']?></td>
            <?php foreach ($redIndex as $key => $value) { ?>
            <td <?php if(in_array($key,$row['red'])){?> style="color:#FF0000;text-decoration:underline;font-weight: bold;" <?php }?>><?php echo $key?></td>
            <?php } ?>
	        <?php foreach ($blueIndex as $key => $value) { ?>
            <td <?php if($key == $row['blue']){?> style="color:#0000FF;text-decoration:underline;font-weight: bold;" <?php }?>><?php echo $key?></td>
            <?php } ?>
            <td><?php echo $row['date']?></td>
        </tr>
        <?php endforeach?>
    </table>
    <?php endif?>
    
    <?php if(!empty($blues)):?>
	<h1>blues</h1>
	<table>
	    <tr>
	        <th>id</th>
	        <?php foreach ($blueIndex as $key => $value) { ?>
            <th style="width:20px;"><?php echo $key?></th>
            <?php } ?>
            <th>date</th>
        </tr>
    <?php foreach ($blues as $row) { ?>
        <tr style="text-align:center">
            <td><?php echo $row['id']?></td>
	        <?php foreach ($blueIndex as $key => $value) { ?>
            <td <?php if($key == $row['blue']){?> style="color:#0000FF;text-decoration:underline;font-weight: bold;" <?php }?>><?php echo $key?></td>
            <?php } ?>
            <td><?php echo $row['date']?></td>
        </tr>
    <?php } ?>
    </table>
    <?php endif?>

</div>
</body>
</html>