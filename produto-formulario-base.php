<div class="form-group">
    <input type="hidden" name="id" value="<?= $_GET["id"]?>">
    <label class="inline">Nome do Produto</label>
    <input class="form-control" name="nome" type="text" value="<?= $produto->getNome() ?>">

</div>

<div class="form-group">

    <label class="inline">* Preço (+ taxa de importacao de 10% por produto)</label>
    <input class="form-control" type="number" name="preco" value="<?= $produto->getPreco() ?>">

</div>

<div class="form-group">

    <label class="inline">Descrição</label>
    <textarea class="form-control" name="descricao" style="min-height: 100px;"><?= $produto->getDescricao() ?></textarea>

</div>

<div class="form-group">

    <label class="inline">* Editora (se for um livro)</label>
    <textarea class="form-control" name="editora" style="min-height: 100px;"><?php if($produto->isLivro()) { echo $produto->getEditora(); }  ?></textarea>

</div>

<div class="form-group">

    <label class="inline">* ISBN (se for um livro)</label>
    <textarea class="form-control" name="isbn" style="min-height: 100px;"><?php if($produto->isLivro()) { echo $produto->getIsbn(); }  ?></textarea>

</div>

<div class="form-group">
    <?php require_once('php_controller/lista_categorias.php') ?>

    <label for="sel1">Selecione a categoria:</label>
    <select class="form-control" id="sel1" name="categoria_id">
        <?php
            
            foreach($categorias as $categoria) :
            $selectedCate = $produto->getCategoriaId() == $categoria->id;

            $select = $selectedCate ? "selected='selected'" : "";

            if ($categoria->id == 1 ) : ?>
            <optgroup label="Hardware">
            <?php endif;

            if ($categoria->id == 5) : ?>
                <optgroup label="Livros">
            <?php endif ?>
                <option <?=$select?> value="<?= $categoria->id ?>"><?=$categoria->categoria ?></option>

                <?php if ($categoria->id == 3) : ?>
            </optgroup>
            <?php endif ?>

            <?php if ($categoria->id == 6) : ?>
            </optgroup>
            <?php endif ?>


                <?php endforeach ?>
    </select>

</div>

<br />

<input type="submit" value="Cadastrar" class="btn btn-primary">
