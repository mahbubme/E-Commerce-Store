<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Edit Product</h4>
        <ol class="breadcrumb"></ol>
        <?php display_message(); ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card-box">
            <form action="">

                <div class="form-group m-b-20">
                    <label>Product name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="e.g : Apple iMac">
                </div>

                <div class="form-group m-b-20">
                    <label>Reference <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="e.g : Apple iMac">
                </div>

                <div class="form-group m-b-20">
                    <label>Product Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="5" placeholder="Please enter description"></textarea>
                </div>

                <div class="form-group m-b-20">
                    <label>Product Summary</label>
                    <textarea class="form-control" rows="3" placeholder="Please enter summary"></textarea>
                </div>

                <div class="form-group m-b-20">
                    <label>Categories <span class="text-danger">*</span></label>
                    <select class="form-control select2">
                        <option>Select</option>
                        <optgroup label="Shopping">
                            <option value="SH1">Shopping 1</option>
                            <option value="SH2">Shopping 2</option>
                            <option value="SH3">Shopping 3</option>
                            <option value="SH4">Shopping 4</option>
                        </optgroup>
                        <optgroup label="CRM">
                            <option value="CRM1">Crm 1</option>
                            <option value="CRM2">Crm 2</option>
                            <option value="CRM3">Crm 3</option>
                            <option value="CRM4">Crm 4</option>
                        </optgroup>
                        <optgroup label="eCommerce">
                            <option value="E1">eCommerce 1</option>
                            <option value="E2">eCommerce 2</option>
                            <option value="E3">eCommerce 3</option>
                            <option value="E4">eCommerce 4</option>
                        </optgroup>

                    </select>

                </div>

                <div class="form-group m-b-20">
                    <label>Price <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="$ 562.56">
                </div>

                <div class="form-group m-b-20">
                    <label class="m-b-15">Status <span class="text-danger">*</span></label>
                    <br/>
                    <div class="radio radio-inline">
                        <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                        <label for="inlineRadio1"> Online </label>
                    </div>
                    <div class="radio radio-inline">
                        <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                        <label for="inlineRadio2"> Offline </label>
                    </div>
                    <div class="radio radio-inline">
                        <input type="radio" id="inlineRadio3" value="option3" name="radioInline">
                        <label for="inlineRadio3"> Draft </label>
                    </div>
                </div>

                <div class="form-group m-b-10">
                    <label>Comment</label>
                    <textarea class="form-control" rows="3" placeholder="Please enter summary"></textarea>
                </div>
            </form>
        </div>
    </div>
</div>