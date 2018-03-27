<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Usuario;

/**
 * AccionSearch represents the model behind the search form about `app\models\Accion`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_pregunta', 'id_rol'], 'integer'],
            [['usuario', 'correo', 'cedula', 'nombre', 'apellido',], 'safe'],
            [['activo'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Usuario::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_usuario' => $this->id_usuario,
            'id_pregunta' => $this->id_pregunta,
            'id_rol' => $this->id_rol,
            'activo' => $this->activo,
        ]);

        $query->andFilterWhere(['like', 'correo', $this->correo]);
        $query->andFilterWhere(['like', 'cedula', $this->cedula]);
        $query->andFilterWhere(['like', 'nombre', $this->nombre]);
        $query->andFilterWhere(['like', 'apellido', $this->apellido]);

        return $dataProvider;
    }
}
