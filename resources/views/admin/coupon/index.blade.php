@extends('admin.layouts.app')
@section('content')
{{-- 

</tr>
</tbody>
</table> --}}

<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-defualt">
                    <div class="panel-heading">
                        <div class="row">
                        
                            <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px; margin-top:20px">  All Sliders </h1>

                            <div class="col-md-6">
                                <a style="margin-bottom:15px" href="{{ route('add-slider') }}" class="btn btn-success "><i class="feather icon-plus"></i>
                                    Add New Slider 
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered border-primary">
                            <thead class="table-stripped">
                                <tr style="text-align: center">
                                    <th>Id</th>
                                    <th> Top Slider</th>
                                    <th> Bottom Slider</th>
                                    <th>title</th>
                                    <th>subtitle</th>
                                    <th> Price</th>
                                    {{-- <th>Link</th>
                                    <th>Status</th> --}}
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($sliders as $slider)
                                <tr>
                                <td>{{ $slider->id }}</td>  
                                <td>
                                    <img src="{{ asset('assets/uploads/Sliders/'.$slider->image) }}" style="width: 100px;height:90px" alt="English Image">  
                                </td>
                                <td>
                                    <img src="{{ asset('assets/uploads/Slider/'.$slider->imageSlider) }}" style="width: 100px;height:90px" alt="English Image">  
                                </td>
                                <td>{{ $slider->title }}</td> 
                                <td>{{ $slider->subtitle }}</td>  
                                {{-- <td>{{ $slider->price }}</td>
                                <td>{{ $slider->link }}</td>  --}}
                                <td>{{ $slider->status==1 ? 'Active':'Inactive' }}</td>
                                <td>{{ $slider->created_at }}</td>
                                <td class="table-action">
                                    {{-- <a href="#!" class="btn btn-icon btn-outline-primary"><i class="feather icon-eye"></i></a> --}}
                                    <a href="{{ url('admin/edit-slider/'.$slider->id) }}" class="btn btn-icon btn-outline-primary btn-sm"><i class="feather icon-edit"></i></a>
                                    <a href="{{ url('admin/delete-slider/'.$slider->id) }}" class="btn btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a>
                                </td>

                                </tr>  
                              @endforeach


                            </tbody>
                        </table>
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
    </div>
    

                           
                        
@endsection