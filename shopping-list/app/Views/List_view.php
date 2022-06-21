

<div class="">

   

   <?php if(isset($_SESSION['ListID'])):?>
        <div class="flex">
            <label style="font-size:20px"><b>Basket id : &#x9; </b></label>
            <label for="" style="margin: 5px;">&#x9;&#x9;&#x9;&#x9;</label>
            <label for="" style="margin: 5px;">&#x9;&#x9;<?=$testID?></label>
            <div class="flex" style="margin-left: 60px;">
            <div class=""><a href="delete"><img src="../assets/images/bin.svg" alt=""></a></div>
            </div>
        </div>

        <br>

        <strong> Foods Chosen </strong>
        <table class="list-table">
            <thead>
                <tr>
                    <td>_id</td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($listData as $l):?>
            <?php if($l == '62b21fe2e2a846eb57038dc1'):?>
                <!-- Dont display Test -->
            <?php else:?>
           
            <tr>
                <td><label for=""><?=$l;?></label></td> 
            </tr>
            
            <?php endif ;?>
        <?php endforeach ;?>
                
            </tbody>
        </table>
       
       

        <?php else:?>
            <div class=""><a href="createList">+</a></div>
    <?php endif ;?>
  
</div>
            
