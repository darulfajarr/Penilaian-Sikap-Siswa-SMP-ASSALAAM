
        {{Form::open(array('url'=>'','files'=>true))}}


        <div class="form-group">
          <label for>Jenis</label>
            <select class="form-control input-sm" name="">
                <option value="{{$jeniss->id}}">{{$jeniss->nama}}</option>
            </select>
        </div>

<div class="form-group">
          <label for>Nama</label>
            <select class="form-control input-sm" name="">
                <option value=""></option>
            </select>
        </div>

        {{Form::Close()}}