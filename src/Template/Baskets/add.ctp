            <tr class="basket-item">
                <td>
                    
                        <select name="benefit_id[]" id="benefit-id">
                                <?php foreach ($benefits as $benefit) :?>
                                    <option value="<?php echo $benefit->id; ?>"><?php echo $benefit->designation; ?></option>
                                <?php endforeach; ?>
                        </select>  
                        <label for="" class="">Prestation</label>
                </td>
                <td>
                    <div class="col s12 input-field"> 
                        <i class="ion-ios-pricetag small prefix game-main-color"></i>
                             <input type="number" name="price[]" class="required" id="price">
                        <label class="" for="price">Prix</label>
                    </div>
                </td>
                <td>
                    <div class="col s12 input-field"> 
                        <i class="ion-social-dropbox small prefix game-main-color"></i>
                             <input type="number" name="qte[]" class="required" id="qte">
                        <label class="" for="qte">Qte</label>
                    </div>
                </td>
                <td class="basket-item-total">
                     <div class="col s12 input-field"> 
                        <i class="ion-social-buffer-outline small prefix game-main-color"></i>
                        <input type="number" name="total" class="required pfacture" id="" disabled="disabled">
                        <label class="active" for="total">Montant</label>
                    </div>        
                </td>
                <td><i class="ion-android-cancel small pink-text retired-basket-item"></i></td>
            </tr>
 <script>
   $(document).ready(function() {
    $('select').material_select();
        });
</script> 
