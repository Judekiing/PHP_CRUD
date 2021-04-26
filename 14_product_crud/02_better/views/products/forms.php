<form  action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label >Product Image</label>
            <br>
            <input type="file" name="image" >
        </div>
    
        <div class="form-group">
            <label >Product Title</label>
            <input type="text" name='title' value="<?php echo $title ?>" class="form-control">
        </div> 
        <div class="form-group">
            <label >Product Description</label>
            <textarea name="description"  value="<?php echo $description ?>" class="form-control"> </textarea>
        </div>
        <div class="form-group">
            <label >Product Price</label>
            <input type="number" name="price" step=".01"  value="<?php echo $price ?>" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>