<script>
    function editar(id, txt_tarefa) {
        // Criando o formulário de Edição
        let form = document.createElement("form");
        form.action = "tarefa_controller.php?acao=atualizar";
        form.method = "POST";
        form.className = "row";

        // Criando o input do formulário
        let inputTarefa = document.createElement("input");
        inputTarefa.type = "text";
        inputTarefa.name = "tarefa";
        inputTarefa.className = "col-9 form-control";
        inputTarefa.value = txt_tarefa;

        // Input Hidden - id da tarefa
        let inputId = document.createElement("input");
        inputId.type = "hidden";
        inputId.name = "id";
        inputId.value = id;

        // Criando o btn do formulário
        let button = document.createElement("button");
        button.type = "submit";
        button.className = "col-3 btn btn-info";
        button.innerHTML = "Atualizar";

        // Incluir o campo input no form
        form.appendChild(inputTarefa);

        // Incluir o campo input hidden ID
        form.appendChild(inputId);

        // Incluir o btn no form
        form.appendChild(button);

        // Selecionar a DIV onde ira inserir o formulário
        let tarefa = document.getElementById("tarefa_" + id);

        // limpar a tarefa para inserir o formulário de edição
        tarefa.innerHTML = "";

        // Incluir o formulário na area de edição
        tarefa.insertBefore(form, tarefa[0]);
    }

    function remover(id) {
        location.href = "todas_tarefas.php?acao=remover&id=" + id;
    }

    function marcarRealizada(id) {
        location.href = "todas_tarefas.php?acao=realizada&id=" + id;
    }
</script>