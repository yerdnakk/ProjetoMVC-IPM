async function editProduto(id){
    const local = 'index.php?pg=admin&act=update&id=' + id

    const dados = await fetch(local);
    const resposta = await dados.json();
    console.log(resposta);

    const form = document.querySelector('#edit-produto');
    form.action = local;

    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
    editModal.show();

    document.getElementById('pronome').value = resposta['dados'].pronome;
    document.getElementById('propreco').value = resposta['dados'].propreco;
    document.getElementById('proestoque').value = resposta['dados'].proestoque;
    document.getElementById('protamanho').value = resposta['dados'].protamanho;
    document.getElementById('prodescricao').value = resposta['dados'].prodescricao;
}
    
async function addProduto(){
    const addModal = new bootstrap.Modal(document.getElementById('addModal'));
    addModal.show();
}    