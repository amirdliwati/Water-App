<div class="row form-material">
	<div class="col-md-12">
        <div class="paper">
            <div class="paper-content">
                <textarea type="text" class=" @error('previous_problem') is-invalid @enderror mx" id="previous_problem" name="previous_problem" value="{{ old('previous_problem') }}" autocomplete="address" placeholder=" الخلل السابق " autofocus required rows="5" maxlength="300" minlength="3" data-toggle="tooltip" data-placement="left" title="{{ __(' الخلل السابق ')}}" data-parsley-required-message="هذا الحقل مطلوب" > {{ $Form->result->previous_problem }} </textarea>
                @error('previous_problem')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div> <!-- paper-content -->
        </div> <!-- paper -->
    </div> <!-- end col -->
</div> <!-- end row -->
	<br><br>
<div class="row form-material">
	<div class="col-md-4">
		<p class="text-muted font-14 mt-3 mb-2"> الخزان الأرضي </p>
        @if($Form->result->ground_tank == 0)                                 
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="ground_tank" id="ground_tank0" value="0" checked="">
            <label for="ground_tank0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="ground_tank" id="ground_tank1" value="1">
            <label for="ground_tank1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="ground_tank" id="ground_tank2" value="2">
            <label for="ground_tank2">
                 غير سليم
            </label>
        </div>
        @elseif($Form->result->ground_tank == 1)
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="ground_tank" id="ground_tank0" value="0">
            <label for="ground_tank0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="ground_tank" id="ground_tank1" value="1" checked="">
            <label for="ground_tank1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="ground_tank" id="ground_tank2" value="2">
            <label for="ground_tank2">
                 غير سليم
            </label>
        </div>
        @else
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="ground_tank" id="ground_tank0" value="0">
            <label for="ground_tank0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="ground_tank" id="ground_tank1" value="1">
            <label for="ground_tank1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="ground_tank" id="ground_tank2" value="2" checked="">
            <label for="ground_tank2">
                 غير سليم
            </label>
        </div>
        @endif
    </div> <!-- end col -->
    <div class="col-md-4">
    	<p class="text-muted font-14 mt-3 mb-2">  الوصلة بين العداد و الخزان الأرضي	 </p>
        @if($Form->result->link_ground_tank == 0)                                 
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="link_ground_tank" id="link_ground_tank0" value="0" checked="">
            <label for="link_ground_tank0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="link_ground_tank" id="link_ground_tank1" value="1">
            <label for="link_ground_tank1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="link_ground_tank" id="link_ground_tank2" value="2">
            <label for="link_ground_tank2">
                 غير سليم
            </label>
        </div>
        @elseif($Form->result->link_ground_tank == 1)
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="link_ground_tank" id="link_ground_tank0" value="0">
            <label for="link_ground_tank0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="link_ground_tank" id="link_ground_tank1" value="1" checked="">
            <label for="link_ground_tank1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="link_ground_tank" id="link_ground_tank2" value="2">
            <label for="link_ground_tank2">
                 غير سليم
            </label>
        </div>
        @else
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="link_ground_tank" id="link_ground_tank0" value="0">
            <label for="link_ground_tank0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="link_ground_tank" id="link_ground_tank1" value="1">
            <label for="link_ground_tank1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="link_ground_tank" id="link_ground_tank2" value="2" checked="">
            <label for="link_ground_tank2">
                 غير سليم
            </label>
        </div>
        @endif  
    </div> <!-- end col -->
    <div class="col-md-4">
    	<p class="text-muted font-14 mt-3 mb-2"> الخطوط النازلة </p>
        @if($Form->result->under_line == 0)                               
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="under_line" id="under_line0" value="0" checked="">
            <label for="under_line0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="under_line" id="under_line1" value="1">
            <label for="under_line1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="under_line" id="under_line2" value="2">
            <label for="under_line2">
                 غير سليم
            </label>
        </div>
        @elseif($Form->result->under_line == 1)
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="under_line" id="under_line0" value="0">
            <label for="under_line0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="under_line" id="under_line1" value="1" checked="">
            <label for="under_line1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="under_line" id="under_line2" value="2">
            <label for="under_line2">
                 غير سليم
            </label>
        </div>
        @else
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="under_line" id="under_line0" value="0">
            <label for="under_line0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="under_line" id="under_line1" value="1">
            <label for="under_line1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="under_line" id="under_line2" value="2" checked="">
            <label for="under_line2">
                 غير سليم
            </label>
        </div>
        @endif 
    </div> <!-- end col -->
</div> <!-- end row -->

<div class="row form-material">
	<div class="col-md-4">
		<p class="text-muted font-14 mt-3 mb-2">  الحنفيات  </p>
        @if($Form->result->faucet == 0)                                 
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="faucet" id="faucet0" value="0" checked="">
            <label for="faucet0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="faucet" id="faucet1" value="1">
            <label for="faucet1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="faucet" id="faucet2" value="2">
            <label for="faucet2">
                 غير سليم
            </label>
        </div>
        @elseif($Form->result->faucet == 1)
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="faucet" id="faucet0" value="0">
            <label for="faucet0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="faucet" id="faucet1" value="1" checked="">
            <label for="faucet1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="faucet" id="faucet2" value="2">
            <label for="faucet2">
                 غير سليم
            </label>
        </div>
        @else
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="faucet" id="faucet0" value="0">
            <label for="faucet0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="faucet" id="faucet1" value="1">
            <label for="faucet1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="faucet" id="faucet2" value="2" checked="">
            <label for="faucet2">
                 غير سليم
            </label>
        </div>
        @endif 
    </div> <!-- end col -->
    <div class="col-md-4">
    	<p class="text-muted font-14 mt-3 mb-2"> صناديق الطرد  </p>
        @if($Form->result->box == 0)                                 
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="box" id="box0" value="0" checked="">
            <label for="box0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="box" id="box1" value="1">
            <label for="box1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="box" id="box2" value="2">
            <label for="box2">
                 غير سليم
            </label>
        </div>
        @elseif($Form->result->box == 1)
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="box" id="box0" value="0">
            <label for="box0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="box" id="box1" value="1" checked="">
            <label for="box1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="box" id="box2" value="2">
            <label for="box2">
                 غير سليم
            </label>
        </div>
        @else
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="box" id="box0" value="0">
            <label for="box0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="box" id="box1" value="1">
            <label for="box1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="box" id="box2" value="2" checked="">
            <label for="box2">
                 غير سليم
            </label>
        </div>
        @endif  
    </div> <!-- end col -->
    <div class="col-md-4">
    	<p class="text-muted font-14 mt-3 mb-2"> الخزان العلوي  </p>
        @if($Form->result->above_ground_tank == 0)                                  
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="above_ground_tank" id="above_ground_tank0" value="0" checked="">
            <label for="above_ground_tank0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="above_ground_tank" id="above_ground_tank1" value="1">
            <label for="above_ground_tank1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="above_ground_tank" id="above_ground_tank2" value="2">
            <label for="above_ground_tank2">
                 غير سليم
            </label>
        </div>
        @elseif($Form->result->above_ground_tank == 1)
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="above_ground_tank" id="above_ground_tank0" value="0">
            <label for="above_ground_tank0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="above_ground_tank" id="above_ground_tank1" value="1" checked="">
            <label for="above_ground_tank1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="above_ground_tank" id="above_ground_tank2" value="2">
            <label for="above_ground_tank2">
                 غير سليم
            </label>
        </div>
        @else
        <div class="radio radio-warning form-check-inline">
            <input type="radio" name="above_ground_tank" id="above_ground_tank0" value="0">
            <label for="above_ground_tank0">
                لم يتم الفحص
            </label>
        </div>
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="above_ground_tank" id="above_ground_tank1" value="1">
            <label for="above_ground_tank1">
                سليم
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="above_ground_tank" id="above_ground_tank2" value="2" checked="">
            <label for="above_ground_tank2">
                 غير سليم
            </label>
        </div>
        @endif  
    </div> <!-- end col -->
</div> <!-- end row -->
	<br>
<div class="ribbon-1">
    <div class="ribbon-box">
    	<div class="ribbon ribbon-mark ribbon-right bg-primary">  أماكن الخلل  </div>
			<div class="row form-material">
				<div class="col-md-3">
                    @if($Form->result->area_problem_1 == 1)
			        <div class="checkbox  form-check-inline">
			            <input type="checkbox" id="area_problem_1" name="area_problem_1" value="1" checked="">
			            <label for="area_problem_1"> {{__('   الجسم  ')}} </label>
			        </div>
                    @else
                    <div class="checkbox  form-check-inline">
                        <input type="checkbox" id="area_problem_1" name="area_problem_1" value="1">
                        <label for="area_problem_1"> {{__('   الجسم  ')}} </label>
                    </div>
                    @endif
				</div><!-- end col -->
				<div class="col-md-3">
                    @if($Form->result->area_problem_2 == 1)
			        <div class="checkbox checkbox-info form-check-inline">
			            <input type="checkbox" id="area_problem_2" name="area_problem_2" value="1" checked="">
			            <label for="area_problem_2"> {{__('  الرقبة  ')}} </label>
			        </div>
                    @else
                    <div class="checkbox checkbox-info form-check-inline">
                        <input type="checkbox" id="area_problem_2" name="area_problem_2" value="1">
                        <label for="area_problem_2"> {{__('  الرقبة  ')}} </label>
                    </div>
                    @endif
				</div><!-- end col -->
				<div class="col-md-3">
                    @if($Form->result->area_problem_3 == 1)
			        <div class="checkbox checkbox-primary form-check-inline">
			            <input type="checkbox" id="area_problem_3" name="area_problem_3" value="1" checked="">
			            <label for="area_problem_3"> {{__('   العوامة  ')}} </label>
			        </div>
                    @else
                    <div class="checkbox checkbox-primary form-check-inline">
                        <input type="checkbox" id="area_problem_3" name="area_problem_3" value="1">
                        <label for="area_problem_3"> {{__('   العوامة  ')}} </label>
                    </div>
                    @endif
				</div><!-- end col -->
				<div class="col-md-3">
                    @if($Form->result->area_problem_4 == 1)
			        <div class="checkbox checkbox-success form-check-inline">
			            <input type="checkbox" id="area_problem_4" name="area_problem_4" value="1" checked="">
			            <label for="area_problem_4"> {{__('  جذور الأشجار  ')}} </label>
			        </div>
                    @else
                    <div class="checkbox checkbox-success form-check-inline">
                        <input type="checkbox" id="area_problem_4" name="area_problem_4" value="1">
                        <label for="area_problem_4"> {{__('  جذور الأشجار  ')}} </label>
                    </div>
                    @endif
				</div><!-- end col -->
			</div> <!-- end row -->
			<div class="row form-material">
				<div class="col-md-4">
					<label for="area_problem_count_1" class="col-form-label text-right">{{__('العدد ')}}</label>
				      <input type="number" class="form-control  @error('area_problem_count_1') is-invalid @enderror" id="area_problem_count_1" name="area_problem_count_1" value="{{ $Form->result->area_problem_count_1 }}" autocomplete="area_problem_count_1" placeholder="" autofocus >
				      @error('area_problem_count_1')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-4">
					<label for="area_problem_count_2" class="col-form-label text-right">{{__(' العدد ')}}</label>
				      <input type="number" class="form-control  @error('area_problem_count_2') is-invalid @enderror" id="area_problem_count_2" name="area_problem_count_2" value="{{ $Form->result->area_problem_count_2 }}" autocomplete="area_problem_count_2" placeholder="" autofocus >
				      @error('area_problem_count_2')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-4">
					<label for="area_problem_count_3" class="col-form-label text-right">{{__(' العدد ')}}</label>
				      <input type="number" class="form-control  @error('area_problem_count_3') is-invalid @enderror" id="area_problem_count_3" name="area_problem_count_3" value="{{ $Form->result->area_problem_count_3 }}" autocomplete="area_problem_count_3" placeholder="" autofocus >
				      @error('area_problem_count_3')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->

			</div> <!-- end row -->
	</div><!-- end ribbon-box -->
</div><!-- end ribbon-1 -->

<div class="row form-material">
	<div class="col-md-3">
        @if($Form->result->area_problem_11 == 1)
        <div class="checkbox  form-check-inline">
            <input type="checkbox" id="area_problem_11" name="area_problem_11" value="1" checked="">
            <label for="area_problem_11"> {{__('   الجسم  ')}} </label>
        </div>
        @else
        <div class="checkbox  form-check-inline">
            <input type="checkbox" id="area_problem_11" name="area_problem_11" value="1">
            <label for="area_problem_11"> {{__('   الجسم  ')}} </label>
        </div>
        @endif
	</div><!-- end col -->
	<div class="col-md-3">
        @if($Form->result->area_problem_33 == 1)
        <div class="checkbox checkbox-primary form-check-inline">
            <input type="checkbox" id="area_problem_33" name="area_problem_33" value="1" checked="">
            <label for="area_problem_33"> {{__('   العوامة  ')}} </label>
        </div>
        @else
        <div class="checkbox checkbox-primary form-check-inline">
            <input type="checkbox" id="area_problem_33" name="area_problem_33" value="1">
            <label for="area_problem_33"> {{__('   العوامة  ')}} </label>
        </div>
        @endif
	</div><!-- end col -->
</div> <!-- end row -->