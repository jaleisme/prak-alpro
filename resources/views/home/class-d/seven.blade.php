@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">Welcome to Wartel Ijal, <span style="font-weight: bold;">Guest!</span></h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Started at</label>
                                <input type="time" class="form-control" id="start" placeholder="Started at...">
                                {{-- <span class="help-block">Value must be a number</span> --}}
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 text-center mt-5">
                            <span style="font-weight: bold; display: flex; justify-content: center; align-items: center; padding : 5vh 0;">to</span>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Finsihed at</label>
                                <input type="time" class="form-control" id="end" placeholder="Finished at...">
                                {{-- <span class="help-block">Value must be a number</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">Your total price is : <b>Rp.</b><span style="font-weight: bold;" id="final_price">-</span></h4>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let start = 0, end = 0, price = 0, duration = 0
    const pps = 30
    $('input').change(function(){
        // console.log($(this).val());
        $("#final_price").text('')
        if($(this).attr("id") == "start"){
            start = $(this).val()
        }
        else if($(this).attr("id") == "end"){
            end = $(this).val()
        }
        if(start != 0 && end != 0 && start != end){
            duration = 0, price = 0
            duration = calculateDuration(start, end)
            price = duration * pps
            $("#final_price").text(price.toLocaleString())
        }
    })
    function calculateDuration(start, end){
        var start_hour = 0, end_hour = 0, start_minute = 0, end_minute = 0
        start = start.split(":")
        end = end.split(":")

        start_hour = start[0]
        start_minute = start[1]

        end_hour = end[0]
        end_minute = end[1]

        if (end_hour > start_hour) {
            duration = end_hour - start_hour
        } else if(end_hour < start_hour) {
            duration = 24 - start_hour
            duration = parseInt(end_hour) + duration
        }  else if(end_hour == start_hour){
            if(end_minute < start_minute){
                duration = 24
            }
        }

        duration = duration*60

        if(end_minute > start_minute){
            duration = duration + parseInt(end_minute) - parseInt(start_minute)
        } else if(end_minute < start_minute) {
            duration = duration + 60 - parseInt(start_minute)
            duration = parseInt(end_minute) + duration
        }
        duration = duration * 60
        return duration
    }
    function commafy( num ) {
        var str = num.toString().split('.');
        if (str[0].length >= 5) {
            str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
        }
        if (str[1] && str[1].length >= 5) {
            str[1] = str[1].replace(/(\d{3})/g, '$1 ');
        }
        return str.join('.');
    }
</script>
@endsection
