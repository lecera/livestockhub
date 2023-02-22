<x-layout>

    <div class="container px-4 px-lg-5 mt-5">
        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="category">Select Category<span style="color:rgb(199, 42, 42)">*</span></label>
                <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category" id="category">
                    <option value="">Please select a category</option>
                    @foreach(['Cow' => 'Cow', 'Carabao' => 'Carabao', 'Goat' => 'Goat'] as $value => $label)
                        <option value="{{ $value }}" {{ old('category') == $value ? 'selected' : '' }}> {{ $label }} </option>
                    @endforeach
                </select>
                @if ($errors->has('category'))
                    <div class="invalid-feedback">{{ $errors->first('category') }}</div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="age">Age<span style="color:rgb(199, 42, 42)">*</span></label>
                <input type="number" name="age" class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" onkeypress="return isNumber(event)" oninput="checkAge()" id="age" value="{{old('age')}}">
                @if ($errors->has('age'))
                    <div class="invalid-feedback">{{ $errors->first('age') }}</div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="gender">Gender<span style="color:rgb(199, 42, 42)">*</span></label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                    <option value="">Please select gender</option>
                    @foreach(['Male' => 'Male', 'Female' => 'Female'] as $value => $label)
                        <option value="{{ $value }}" {{ old('gender') == $value ? 'selected' : ''}}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="weight">Weight(kg) <span style="color:rgb(172, 165, 165);">optional</span></label>
                <input type="text" name="weight" class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" oninput="formatNumber(this)" id="weight" value="{{old('weight')}}" >
                @if ($errors->has('weight'))
                    <div class="invalid-feedback">{{ $errors->first('weight') }}</div>
                @endif
            </div>
            
            <div class="form-group mb-3">
                <label for="quantity">Quantity<span style="color:rgb(199, 42, 42)">*</span></label>
                <input type="text" name="quantity" class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" id="quantity" onkeypress="return isNumber(event)" oninput="checkQuantity()" value="{{old('quantity')}}">
                @if ($errors->has('quantity'))
                    <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="location">Location<span style="color:rgb(199, 42, 42)">*</span></label>
                <input type="text" name="location" class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" id="location" value="{{old('location')}}">
                @if ($errors->has('location'))
                    <div class="invalid-feedback">{{ $errors->first('location') }}</div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" rows="3">{{old('description')}}</textarea>
                @if ($errors->has('description'))
                    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="price">Price<span style="color:rgb(199, 42, 42)">*</span></label>
                <input type="text" id="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" oninput="formatNumber(this)" value="{{old('price')}}">
                {{-- <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" value="{{old('price')}}"> --}}
                @if ($errors->has('price'))
                    <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="seller_mobile_number">Seller Mobile Number<span style="color:rgb(199, 42, 42)">*</span> <span style="color:rgb(172, 165, 165);font-size:small">(must starts with "09")</span></label>
                <input type="text" id="seller_mobile_number" name="seller_mobile_number" class="form-control {{ $errors->has('seller_mobile_number') ? 'is-invalid' : '' }}" onkeypress="return isNumberKey(event)" oninput="checkMobileNumberLength()">
                {{-- <input type="number" name="seller_mobile_number" class="form-control {{ $errors->has('seller_mobile_number') ? 'is-invalid' : '' }}" id="seller_mobile_number" value="{{old('seller_mobile_number')}}"> --}}
                @if ($errors->has('seller_mobile_number'))
                    <div class="invalid-feedback">{{ $errors->first('seller_mobile_number') }}</div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="photo">Photo<span style="color:rgb(199, 42, 42)">*</span></label>
                <input type="file" name="photo" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo" >
                @if ($errors->has('photo'))
                    <div class="invalid-feedback">{{ $errors->first('photo') }}</div>
                @endif
            </div>

            <button class="btn btn-primary btn-sm mb-3">Submit</button>
        </form>
    </div>
    
    <script>
        function isNumber(evt) {
            var input = evt.target || evt.srcElement;
            if (input.value.length >= 2) {
                return false;
            }

            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        function checkQuantity() {
            var input = document.getElementById('quantity');
            if (input.value.length > 2) {
                input.style.borderColor = "red";
                input.setCustomValidity("Only two digits is allowed!");
            } else {
                input.style.borderColor = "";
                input.setCustomValidity("");
            }
        }

        function checkAge() {
            var input = document.getElementById('age');
            if (input.value.length > 2) {
                input.style.borderColor = "red";
                input.setCustomValidity("Invalid age!");
            } else {
                input.style.borderColor = "";
                input.setCustomValidity("");
            }
        }

        function formatNumber(input) {
            // Remove any non-numeric and non-comma characters from the input value
            var value = input.value.replace(/[^0-9]/g, '');

            // Only keep the first 5 digits
            value = value.substr(0, 5);

            // Add commas every 3 digits in the integer part
            var formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            // Set the formatted value back to the input element
            input.value = formattedValue;
        }

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }

            // Check if the number of digits entered so far is less than 11
            var input = evt.target || evt.srcElement;
            if (input.value.length >= 11) {
                return false;
            }

            // Check if the first digit is 0 and the second digit is 9
            if (input.value.length === 0 && charCode !== 48) {
                return false;
            } else if (input.value.length === 1 && charCode !== 57) {
                return false;
            }

            return true;
        }

        function checkMobileNumberLength() {
            var input = document.getElementById("seller_mobile_number");
            if (input.value.length > 11 || input.value.length < 11) {
                input.style.borderColor = "red";
                input.setCustomValidity("Mobile number must be 11 digits");
            } else if (input.value.length < 2 || (input.value.substring(0, 2) !== "09" && input.value.substring(0, 2) !== "00")) {
                input.style.borderColor = "red";
                input.setCustomValidity("Mobile number must start with '09'");
            } else {
                input.style.borderColor = "";
                input.setCustomValidity("");
            }
        }

    </script>


      
</x-layout>