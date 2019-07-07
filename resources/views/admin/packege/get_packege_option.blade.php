<legend style="background-color: green;color: #fff;text-align: center;"><b>Packege Option:{{$row_index}}</b></legend>
<table class="table table-bordered">
 <thead>
<tr class="variation_row">
     <td>
        <input type="text" name="packege_variation[{{$row_index}}][option_name]" id="option_name" class="form-control" placeholder="Option Name">
       
     </td>
      <td>
        <input type="date" name="packege_variation[{{$row_index}}][start_date]" id="start_date" class="form-control" placeholder="Strat Date">  
     </td>
      <td>
        <input type="date" name="packege_variation[{{$row_index}}][end_date]" id="end_date" class="form-control" placeholder="End Date">  
     </td>
      <td>
        <input type="text" name="packege_variation[{{$row_index}}][option_price]" id="option_price" class="form-control" placeholder="Option Price"> 
        <input type="hidden" class="row_index" value="{{$row_index}}"> 
     </td>
 </tr>
 <tr>
     <td colspan="4">
        <legend> Packege Itinary:
             <button type="button" class="btn btn-success btn-xs add_variation_value_row" data-id="{{$row_index}}">+</button>
               <input type="hidden" id="variation_id_{{$row_index}}" value="1">
        </legend> 
     </td>
 </tr>
 </thead>
 <tbody id="itinary_option_{{$row_index}}">
       <tr>
        <td colspan="1">
             <input type="date" name="packege_variation[{{$row_index}}][variation][0][itinary_date]" id="itinary_date" class="form-control" placeholder="Itinary Date">  
         </td>
         <td colspan="2">
              <input type="text" name="packege_variation[{{$row_index}}][variation][0][itinary_name]" id="itinary_name" class="form-control" placeholder="Itinary Name">  
         </td>
         <td>
             <button type="button" class="btn btn-danger btn-xs remove_variation_value_row">-</button>
         </td>
     </tr>
 </tbody>
 </table>