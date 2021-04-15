<style>
	.font-large {
		font-size: 14px
	}
</style>

<div class="col-md-10">
    <div class="card">
        <div class="card-header">一覧画面</div>

        <div class="card-body">
			<div class="mb-1"><a class="btn btn-primary" href="/admin/items/add" role="button">新規登録</a></div>
			<table class="table table-striped">
				<thead>
					<tr>
					<th scope="col">操作</th>
					<th scope="col">販売ステータス</th>
					<th scope="col">商品名</th>
					<th scope="col">画像</th>
					<th scope="col">価格</th>
					<th scope="col">説明文</th>
					<th scope="col">検索用タグ</th>
					</tr>
				</thead>
				<tbody>
                    {% for index, item in items %}
					<tr>
					<td>
					<div class="btn-toolbar" role="toolbar">
						<div class="btn-group mr-2" role="group">
							<a class="btn btn-info btn-sm" href="/admin/items/view/{{ item.id }}" role="button">詳細</a>
						</div>
					</div>
					</td>
					<td>{{ item.status }}</td>
					<td>{{ item.name }}</td>
					<td>{{ item.img }}</td>
					<td>{{ item.price }}円</td>
					<td>{{ item.description }}</td>
					<td>{{ item.tag_for_search }}</td>
					</tr>
                    {% endfor %}
				</tbody>
			</table>
        </div>
    </div>
</div>