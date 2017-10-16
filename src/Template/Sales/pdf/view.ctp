<?php  $this->layout = 'default'; ?>
<style>
/*GENERIC CLASSES FOR TBODY CELLS*/
.table-spacement{
    margin-top: 15mm;
}

.center{
    align:center;
}

.cell-25
{
    width:25%;
}

.cell-50
{
    width:50%;
}

.cell-75
{
    width:75%;
}

.bold{
    font-weight: bold;
}
.cell-100
{
    width:100%;
}


th {
        font-weight: bold;
        text-align:left;
    }


table{width:100%;}  

table tr{
    border-bottom:solid 2mm pink !important;
}

table td{
    text-align:left; padding:2mm 1mm 1.4mm 0mm;
    font-size: 2.78mm;
      }


/*Classes for img*/
td.logo-wrapper-circle{
position: relative;
left: 5%;
border:1mm solid pink;
width: 27mm;
height: 22mm;
border-radius: 17mm;
background: white;
overflow: hidden;
-webkit-filter:50%;
-moz-filter: 50%;
}

td.logo-wrapper-circle img{
    position: relative;
    width: 23mm;
}



</style>

<page>
    
       <table align="center">
            <tr>
                <td align="center" class="logo-wrapper-circle cell-100">
                    <?php echo $this->Html->image('http://192.168.190.148/grinBote/img/grindbote.png'); ?>
                </td>      
            </tr>
        </table>

        <table style="vertical-align:top;"> 
            <tr>    
                    <td class="cell-50"  align="left"> Facture <strong>N°000<?= $sale->id ?> </strong></td>
                    <td class="cell-50"  align="right"> Date : <strong><?php 
                             if($sale->impressed=="null")
                            {
                                echo $time;
                            }
                            else
                            {
                                 echo $sale->impressed;
                            }

                    ?></strong></td>
            </tr>
            <tr>    
                    <td class="cell-50" align="left"> Client :<strong><?= $sale['customer'] ?> </strong> </td>
                    <td class="cell-50" align="right" style="font-size:3mm;"> Caisse : <strong><?= $sale->user->nom." ".strtolower($sale->user->prenom) ?></strong>   </td>
            </tr>
        </table>

        <table style="border-top:solid 0.5mm pink; padding:1.2mm;border-bottom:solid 0.5mm pink; vertical-align:top;">
            <tbody>
                <tr>
                    <td align="center" class="bold" style="font-size:3.2mm;">Designation</td>
                    <td align="center" class="bold" style="font-size:3.2mm;">Prix</td>
                    <td align="center" class="bold" style="font-size:3.2mm;">Quantité</td>
                    <td align="right" class="bold" style="font-size:3.2mm;">Montant</td>
                </tr>
                    <?php foreach ($relatedbaskets as $relatedbasket): ?>
                    <tr>
                        <td class="cell-25" style="border-bottom:dotted 0.5mm pink;"> <?= h($relatedbasket->benefits['designation'])?></td>
                        <td class="cell-25" align="center" style="border-bottom:dotted 0.5mm pink;"> <?= h($relatedbasket->baskets['price']) ?>   </td>
                        <td class="cell-25" align="center" style="border-bottom:dotted 0.5mm pink;"><?= h($relatedbasket->baskets['qte']) ?></td>
                        <td class="cell-25" align="right" style="border-bottom:dotted 0.5mm pink;"><?= h($relatedbasket->baskets['qte']*$relatedbasket->baskets['price']) ?></td>
                    </tr>
                <?php  endforeach; ?>
                     <tr>    
                            <td colspan="3" style="font-size:3mm;"><strong>Total</strong></td>
                            <td align="right"> <strong style="font-size:3mm;"><?=$sale->total ?></strong></td>

                    </tr> 
                    <tr>
                                <td colspan="3" style="font-size:3mm;"><strong>Remise(<?= $sale->reward ?>%)</strong></td>
                              <td align="right" style="font-size:3mm;"><strong><?=(($sale->reward/100)*($sale->total))?></strong></td>
                    </tr>
                    <tr style="background:pink;">
                        <td colspan="3" style="font-size:3mm; border-right:1mm solid pink;"><strong>Net à payer</strong></td>
                        <?php if($sale->reward>0) :?>
                                <td align="right"> <strong style="font-size:3mm;border-left:1mm solid pink;"><?= ($sale->total-($sale->reward/100)*($sale->total))?></strong></td>
                        <?php else: ?>
                            <td align="right"> <strong style="font-size:3mm;border-left:1mm solid pink;"><?=$sale->total ?></strong></td>
                        <?php endif; ?>
                    </tr>
            </tbody>
        </table>

        
   
            <table align="center">
            <tr>
                <td align="center" class="cell-100" style=" border-bottom:solid 0.5mm pink;">
                    <strong style="font-size:3mm;">Horaires d'ouverture :</strong><br>
                    lun-ven 9h-22h / sam-dim 10h-23h <br>
                    <strong> L'équipe de Grin d'Boté vous remercie.</strong><br><br>        
                    Cocody Mermoz <br>  
                    Cel : 03 21 99 59 - 07 07 81 11 <br>    
                    Reservations sur <strong>www.grindebote.com/reservations</strong> 
                    <strong>Un cadeau se cache derriere ce code !</strong>
                </td>      
            </tr>
                    <tr>    
                        <!-- QRcode Gift-Generator -->
                         <?php $gift="Mr/Mlle/MMe ".$sale->customer." ".$sale->gift->description; ?> 


                            <td class="cell-100" align="center"> <qrcode value="<?php echo $gift; ?>" ec="L" style="width: 23mm; border:none;color:#e91e63;"></qrcode> </td>
                    </tr>
        </table>


</page>
