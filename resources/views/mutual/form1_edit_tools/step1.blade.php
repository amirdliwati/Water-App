<div class="row form-material">
  <div class="col-md-4">
      <label for="date" class="col-form-label text-right"> تاريخ الشكوى  </label>
      <div class="input-group">
        <div class="input-group-append">
          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
        </div>
      <input type="date" class="form-control @error('date') is-invalid @enderror" placeholder="YYY-MM-DD" id="date" name="date" value="{{ $Form->general_informatione->date }}" autocomplete="date" required>
      </div>
      @error('date')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div><!-- end col -->
  <div class="col-md-4">
    <label for="name" class="col-form-label text-right">{{ __('اسم العميل')}}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror mx" id="name" name="name" value="{{ $Form->general_informatione->name }}" autocomplete="name" autofocus required maxlength="90" minlength="3">
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
  </div> <!-- end col -->
  <div class="col-md-4">
      <label for="phone_number" class="col-form-label text-right">{{__('رقم جوال العميل  ')}}</label>
      <div class="input-group"><div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="fas fa-phone text-primary"></i></span></div><input type="number" class="form-control  @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ $Form->general_informatione->phone_number }}" autocomplete="phone_number" placeholder="" autofocus required></div>
      @error('phone_number')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div> <!-- end col -->
</div> <!-- end row -->

<div class="row form-material">
  <div class="col-md-4">
      <label for="account_number" class="col-form-label text-right">{{__('  رقم المشترك  ')}}</label>
      <input type="number" class="form-control  @error('account_number') is-invalid @enderror" id="account_number" name="account_number" value="{{ $Form->general_informatione->account_number }}" autocomplete="account_number" placeholder="" autofocus required>
      @error('account_number')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div> <!-- end col -->
  <div class="col-md-4">
    <label for="region" class="col-form-label text-right"> {{__(' المنطقة')}}</label>
        <input type="text" class="form-control @error('region') is-invalid @enderror mx" id="region" name="region" value="{{ $Form->general_informatione->region }}" autocomplete="region" autofocus maxlength="9" minlength="3">
            @error('region')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
  </div> <!-- end col -->
  <div class="col-md-4">
    <label for="inventory" class="col-form-label text-right"> {{__('الحصر')}}</label>
        <input type="text" class="form-control @error('inventory') is-invalid @enderror mx" id="inventory" name="inventory" value="{{ $Form->general_informatione->inventory }}" autocomplete="inventory" autofocus maxlength="7" minlength="3">
            @error('inventory')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
  </div> <!-- end col -->
</div> <!-- end row -->

<div class="row form-material">
  <div class="col-md-4">
      <label for="counter_number" class="col-form-label text-right">{{__('رقم العداد')}}</label>
      <div class="input-group-append bg-custom b-0"></div><input type="number" class="form-control  @error('counter_number') is-invalid @enderror" id="counter_number" name="counter_number" value="{{ $Form->general_informatione->counter_number }}" autocomplete="counter_number" placeholder="" autofocus required>
      @error('counter_number')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div> <!-- end col -->
  <div class="col-md-4">
    <label for="counter_type" class="col-form-label text-right"> {{__('نوع العداد')}}</label>
        <input type="text" class="form-control @error('counter_type') is-invalid @enderror mx" id="counter_type" name="counter_type" value="{{ $Form->general_informatione->counter_type }}" autocomplete="counter_type" autofocus required maxlength="20" minlength="3">
            @error('counter_type')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
  </div> <!-- end col -->
  <div class="col-md-4">
      <p class="text-muted font-14 mt-3 mb-2">حالة العداد</p>
      @if($Form->general_informatione->counter_state == 1)                                 
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="counter_state" id="counter_state_open" value="1" checked="">
            <label for="counter_state_open">
                مفتوح
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="counter_state" id="counter_state_close" value="0">
            <label for="counter_state_close">
                مقفل
            </label>
        </div>
      @else
        <div class="radio radio-success form-check-inline">
            <input type="radio" name="counter_state" id="counter_state_open" value="1">
            <label for="counter_state_open">
                مفتوح
            </label>
        </div>
        <div class="radio radio-pink form-check-inline">
            <input type="radio" name="counter_state" id="counter_state_close" value="0" checked="">
            <label for="counter_state_close">
                مقفل
            </label>
        </div>
      @endif
    </div> <!-- end col -->
</div> <!-- end row -->

<div class="row form-material">
  <div class="col-md-4">
    <label for="city" class="col-form-label text-right"> {{__(' المدينة ')}}</label>
        <input type="text" class="form-control @error('city') is-invalid @enderror mx" id="city" name="city" value="{{ $Form->general_informatione->city }}" autocomplete="city" autofocus required maxlength="40" minlength="3">
            @error('city')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
  </div> <!-- end col -->
  <div class="col-md-4">
    <label for="soporific_type" class="col-form-label text-right"> {{__('نوع العقار')}}</label>
        <input type="text" class="form-control @error('soporific_type') is-invalid @enderror mx" id="soporific_type" name="soporific_type" value="{{ $Form->general_informatione->soporific_type }}" autocomplete="soporific_type" autofocus required maxlength="20" minlength="3">
            @error('soporific_type')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
  </div> <!-- end col -->
  <div class="col-md-4">
    <label for="soporific_category" class="col-form-label text-right"> {{__('  فئة العقار')}}</label>
        <input type="text" class="form-control @error('soporific_category') is-invalid @enderror mx" id="soporific_category" name="soporific_category" value="{{ $Form->general_informatione->soporific_category }}" autocomplete="soporific_category" autofocus required maxlength="20" minlength="3">
            @error('soporific_category')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
  </div> <!-- end col -->
</div> <!-- end row -->

<div class="row form-material">
  <div class="col-md-5">
      <label for="soporific_space" class="col-form-label text-right">{{__('  مساحة العقار')}}</label>
      <input type="number" step="0.01" class="form-control  @error('soporific_space') is-invalid @enderror ts" id="soporific_space" name="soporific_space" value="{{ $Form->general_informatione->soporific_space }}" autocomplete="soporific_space" placeholder="" autofocus required >
      @error('soporific_space')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div> <!-- end col -->
  <div class="col-md-6">
      <label for="estimated_average" class="col-form-label text-right">{{__('المعدل التقديري  ')}}</label>
      <input type="number" step="0.01" class="form-control  @error('estimated_average') is-invalid @enderror ts" id="estimated_average" name="estimated_average" value="{{ $Form->general_informatione->estimated_average }}" autocomplete="estimated_average" placeholder="" autofocus required >
      @error('estimated_average')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div> <!-- end col -->
</div> <!-- end row -->
  <br>
<div class="row form-material">
  <div class="col-md-12">
        <div class="paper-big">
            <div class="paper-content-big">
                <textarea type="text" class=" @error('recommended') is-invalid @enderror mx" id="recommended" name="recommended" value="{{ old('recommended') }}" autocomplete="address" placeholder="التوصيات" autofocus required rows="5" maxlength="700" minlength="3" data-toggle="tooltip" data-placement="left" title="{{ __('التوصيات')}}" data-parsley-required-message="هذا الحقل مطلوب" >  {{ $Form->general_informatione->recommended }}  </textarea>
                @error('recommended')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div> <!-- paper-content -->
        </div> <!-- paper -->
    </div> <!-- end col -->
</div> <!-- end row -->