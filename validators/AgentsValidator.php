<?php

class AgentsValidator
{
    protected $rules;

    public function __construct()
    {
        $this->rules = [
            'agent' => [
                'required' => [
                    'message' => 'Обязательно напишите ФИО агента'
                ],
                'size' => [
                    'value' => 255,
                    'message' => 'Длина ФИО должна быть меньше 255 символов'
                ],
                'symbols' => [
                    'message' => 'ФИО агента должно содержать только буквы'
                ]

            ],

            'complex' => [
                'required' => [
                    'message' => 'Обязательно напишите название жилого комплекса'
                ],
            ],

            'rewardType' => [
                'required' => [
                    'message' => 'Выберите тип вознаграждения'
                ],
                'selected' => [
                    'message' => 'Выберите "Фикс" или "Процент"'
                ]
            ],

            'rewardSize' => [
                'required' => [
                    'message' => 'Укажите сумму вознаграждения'
                ],
                'max' => [
                    'value' => 1000000,
                    'message' => 'Сумма не должна превышать 1000000'
                ],
                'percent' => [
                    'value' => 15,
                    'message' => 'Процент не должен быть больше 15% от стоимости квартиры'

                ]
            ],

            'validity' => [
                'required' => [
                    'message' => 'Обязательно укажите срок действия договора'
                ],
            ],

            'contractDate' => [
                'required' => [
                    'message' => 'Обязательно укажите дату заключения договора'
                ]
            ]

        ];
    }

    public function validate($data)
    {

        $errors = [];

        foreach ($this->rules as $fieldName => $rule) {
            $fieldNotEmpty = !empty(trim($data[$fieldName]));

            if (isset($rule['required']) && $fieldNotEmpty === false) {
                $errors[$fieldName] = $rule['required']['message'] ?? 'Required.';
            }

            if (isset($rule['size']) && $fieldNotEmpty === true) {

                $size = strlen($data[$fieldName]);

                if ($size > $rule['size']['value']) {
                    $errors[$fieldName] = $rule['size']['message'] ?? 'Size Name Exceeded.';
                }
            }

            if (isset($rule['symbols']) && $fieldNotEmpty === true) {
                if (!preg_match('/^[\p{L} -]+$/u', $data[$fieldName])) {
                    $errors[$fieldName] = $rule['symbols']['message'] ?? 'Is Num.';
                }
            }

            if (isset($rule['max']) && $fieldNotEmpty === true) {
                if ($data['rewardType'] === 'Фикс' && (int)$data[$fieldName] > $rule['max']['value']) {
                    $errors[$fieldName] = $rule['max']['message'] ?? 'Wrong Max Reward.';
                }
            }
            if (isset($rule['percent']) && $fieldNotEmpty === true) {
                if ($data['rewardType'] === 'Процент' && (int)$data[$fieldName] > $rule['percent']['value']) {
                    $errors[$fieldName] = $rule['percent']['message'] ?? 'Wrong Percent.';
                }
            }

            if (isset($rule['selected']) && $fieldNotEmpty === true) {
                if ($data[$fieldName] !== 'Фикс' && $data[$fieldName] !== 'Процент') {
                    $errors[$fieldName] = $rule['selected']['message'] ?? 'Wrong Type Reward.';
                }
            }
        }
        return $errors;
    }
}

function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    //debug_to_console(data);
}