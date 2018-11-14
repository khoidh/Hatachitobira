<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attributeを承認してください。',
    'active_url'           => ':attributeは、有効なURLではありません。',
    'after'                => ':attributeには、:date以降の日付を入力してください。',
    'after_or_equal'       => ':attributeには、:date以降もしくは同日時を入力してください。',
    'alpha'                => ':attributeには、アルファベッドのみ使用できます。',
    'alpha_dash'           => ":attributeには、英数字('A-Z','a-z','0-9')とハイフンと下線('-','_')が使用できます。",
    'alpha_num'            => ":attributeには、英数字('A-Z','a-z','0-9')が使用できます。",
    'array'                => ':attributeには、配列を入力してください。',
    'before'               => ':attributeには、:date以前の日付を入力してください。',
    'before_or_equal'      => ':attributeには、:date以前もしくは同日時を入力してください。',
    'between'              => [
        'numeric' => ':attributeには、:minから、:maxまでの数字を入力してください。',
        'file'    => ':attributeには、:min KBから:max KBまでのサイズのファイルを入力してください。',
        'string'  => ':attributeは、:min文字から:max文字にしてください。',
        'array'   => ':attributeの項目は、:min個から:max個にしてください。',
    ],
    'boolean'              => ":attributeには、'true'か'false'を入力してください。",
    'confirmed'            => ':attributeと:attribute確認が一致しません。',
    'custom_email'         => ':attributeは、有効なメールアドレス形式で入力してください。',
    'date'                 => ':attributeは、正しい日付ではありません。',
    'date_format'          => ":attributeの形式は、':format'と合いません。",
    'different'            => ':attributeと:otherには、異なるものを入力してください。',
    'digits'               => ':attributeは、:digits桁にしてください。',
    'digits_between'       => ':attributeは、:min桁から:max桁にしてください。',
    'dimensions'           => ':attributeは、正しい縦横比ではありません。',
    'distinct'             => ':attributeに重複した値があります。',
    'email'                => ':attributeは、有効なメールアドレス形式で入力してください。',
    'exists'               => '選択された:attributeは、有効ではありません。',
    'file'                 => ':attributeはファイルでなければいけません。',
    'filled'               => ':attributeは必須です。',
    'image'                => ':attributeには、画像を選択してください。',
    'in'                   => '選択された:attributeは、有効ではありません。',
    'in_array'             => ':attributeは、:otherに存在しません。',
    'integer'              => ':attributeには、整数を入力してください。',
    'ip'                   => ':attributeには、有効なIPアドレスを入力してください。',
    'ipv4'                 => ':attributeはIPv4アドレスを入力してください。',
    'ipv6'                 => ':attributeはIPv6アドレスを入力してください。',
    'json'                 => ':attributeには、有効なJSON文字列を入力してください。',
    'max'                  => [
        'numeric' => ':attributeには、:max以下の数字を入力してください。',
        'file'    => ':attributeには、:max KB以下のファイルを入力してください。',
        'string'  => ':attributeは、:max文字以下にしてください。',
        'array'   => ':attributeの項目は、:max個以下にしてください。',
    ],
    'mimes'                => ':attributeには、:valuesタイプのファイルを入力してください。',
    'mimetypes'            => ':attributeには、:valuesタイプのファイルを入力してください。',
    'min'                  => [
        'numeric' => ':attributeには、:min以上の数字を入力してください。',
        'file'    => ':attributeには、:min KB以上のファイルを入力してください。',
        'string'  => ':attributeは、:min文字以上にしてください。',
        'array'   => ':attributeの項目は、:max個以上にしてください。',
    ],
    'not_in'               => '選択された:attributeは、有効ではありません。',
    'numeric'              => ':attributeには、数字を入力してください。',
    'present'              => ':attributeは、必ず存在しなくてはいけません。',
    'regex'                => ':attributeには、有効な正規表現を入力してください。',
    'required'             => ':attributeは、必須入力です。',
    'required_allow_all_spaces' => ':attributeは、必須入力です。',
    'required_if'          => ':otherが:valueの場合、:attributeを入力してください。',
    'required_unless'      => ':otherが:value以外の場合、:attributeを入力してください。',
    'required_with'        => ':valuesが指定されている場合、:attributeも入力してください。',
    'required_with_all'    => ':valuesが全て指定されている場合、:attributeも入力してください。',
    'required_without'     => ':valuesが指定されていない場合、:attributeを入力してください。',
    'required_without_all' => ':valuesが全て指定されていない場合、:attributeを入力してください。',
    'same'                 => ':attributeと:otherが一致しません。',
    'size'                 => [
        'numeric' => ':attributeには、:sizeを入力してください。',
        'file'    => ':attributeには、:size KBのファイルを入力してください。',
        'string'  => ':attributeは、:size文字にしてください。',
        'array'   => ':attributeの項目は、:size個にしてください。',
    ],
    'string'   => ':attributeには、文字を入力してください。',
    'timezone' => ':attributeには、有効なタイムゾーンを入力してください。',
    'unique'   => '入力した:attributeは既に使用されています。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url'      => ':attributeは、有効なURL形式で入力してください。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => '名前',
        'email' => 'メール',
        'password' => 'パスワード',
        'nickname' => 'ニックネーム',
        'password_confirmation' => 'パスワード(再入力)',
        'magazine' => 'メールマガジン',
        'year' => '年',
        'month' => '月',
        'day' => '日',
        'first_name' => '姓',
        'last_name' => '名',
        'first_name_cn' => 'せい',
        'last_name_cn' => 'めい',
        'postal_code' => '郵便番号',
        'address' => '住所',
        'content' => '本文',
        'user_name' => 'お名前',
        'question_type' => 'お問い合わせ内容',
        'phone_number' => '電話番号',
        'company' => '企業名',
        'school' => '学校・学部',
        'school_year' => '学年'
    ],

];
