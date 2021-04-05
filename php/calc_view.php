<div class="calc">
    <h2 class="calc-title">Currency exchange</h2>

    <label>Currency from
        <select name="from" id="select-from">
        <?php foreach ($data as $id => $rate) : ?>
            <option value="<?= $id; ?>"><?= $id; ?></option>
        <?php endforeach; ?>
        </select>
    </label>

    <label>Currency to
        <select name="from" id="select-to">
        <?php foreach ($data as $id => $rate) : ?>
            <option value="<?= $id; ?>"><?= $id; ?></option>
        <?php endforeach; ?>
        </select>
    </label>

    <label>How much
        <input type="number" id="input-from" placeholder="0">
    </label>

    <p id="result">0</p>
</div>