<?php  
    $file = '';
    if($data->image !='null'){
        $ext = pathinfo($data->image);
         $file = $ext['extension'];
    }
                                     
                             
?>
<td>
    @if($file == 'pdf')
    <a href="{{url('/pdf/'.$data->id.'/'.str_replace(' ','-',$data->title))}}" target="_blank"
        class="btn btn-dark btn-sm view-btn"><i class="fa-regular fa-file"></i> View</a>
    @else
    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#{{$data->id}}" class="btn btn-dark btn-sm view-btn"><i
            class="fa-regular fa-file"></i> View</a>
    @endif
</td>

<td> 
    @if($data->image !='null')
    <a href="{{$data->image}}" download class="btn btn-primary btn-sm"><i class="fa-solid fa-download"></i> Download</a>
    @endif
</td>