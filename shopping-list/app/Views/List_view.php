

<div class="">

   

   <?php if(isset($_SESSION['ListID'])):?>
        <div class="flex">
            <Strong>Basket id </Strong>
            <label for=""><?=$testID?></label>
            <div class="flex" style="margin-left: 60px;">
            <div class=""><a href="delete"><img src="../assets/images/bin.svg" alt=""></a></div>
            </div>
        </div>

        <br>
        <strong> Foods Chosen </strong>
        <?php foreach($listData as $l):?>
            <?php if($l == '62b21fe2e2a846eb57038dc1'):?>
                <!-- Dont display Test -->
            <?php else:?>
            <label for=""><?=$l;?></label>
            <br>
            <?php endif ;?>
        <?php endforeach ;?>

        <?php else:?>
            <div class=""><a href="createList">+</a></div>
    <?php endif ;?>
  
</div>
            
