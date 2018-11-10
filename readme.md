{!! $errors->first('username', '<span class="helper-block">:message</span>') !!}


* articles

|field|type(length)|note|
|---|---|---|
|id|int||
|user_id|int||
|image|varchar(255)|大图|
|tags|varchar(255)||
|hits|int||
|push_front|tinyint||
|publish_begin|int||
|publish_end|int||
|status|tinyint||
|created_at|timestamp||
|updated_at|timestamp||

* articles_data

|field|type(length)|note|
|---|---|---|
|article_id|||
|langcode|||
|title|||
|excerpt|||

* article_tags_map

|field|type(length)|note|
|---|---|---|
|article_id|||
|tag_id|||

* article_categories_map

        article_id
        category_id

* article_contents

        id
        vid
        article_id
        weight
        created_at
        updated_at

* article_contents_data

        article_content_id
        langcode
        content


