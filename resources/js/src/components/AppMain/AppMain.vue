<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action chat-list-item active-chat" data-chat-id="1">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Чат 1</h5>
                            <small>3 мин</small>
                        </div>
                        <p class="mb-1">Последнее сообщение из Чата 1...</p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action chat-list-item" data-chat-id="2">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Чат 2</h5>
                            <small>1 час</small>
                        </div>
                        <p class="mb-1">Последнее сообщение из Чата 2...</p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action chat-list-item" data-chat-id="3">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Чат 3</h5>
                            <small>Вчера</small>
                        </div>
                        <p class="mb-1">Последнее сообщение из Чата 3...</p>
                    </a>
                </div>
            </div>
            <div class="col-md-8 chat-area">
                <div class="card">
                    <div class="card-header">
                        Чат 1
                    </div>
                    <div class="card-body">
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Написать сообщение...">
                            <button class="btn btn-primary" type="button">Отправить</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

<script setup>

</script>

<style scoped>
.chat-list-item {
    border-bottom: 1px solid #dee2e6;
    padding: 10px;
    cursor: pointer;
}

.chat-list-item:hover {
    background-color: #e9ecef;
}

.active-chat {
    background-color: #007bff !important;
    color: white !important;
}

.chat-area {
    display: flex;
    flex-direction: column;
    height: calc(100vh - 56px);
}

.card {
    display: flex;
    flex-direction: column;
    height: 100%;
    color: black;

}

.card-body {
    flex-grow: 1;
    overflow-y: auto;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* Выравнивание контента в начале */
}

.card-footer {
    padding: 10px;
    border-top: 1px solid #dee2e6;
}
</style>
