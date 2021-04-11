const areaList = {
    "0":[
        [2, "北海道"], [3, "青森"], [4, "岩手"], [5, "秋田"], [6, "宮城"], [7, "山形"], [8, "福島"],
        [13, "茨城"], [14, "栃木"], [15, "群馬"], [16, "埼玉"], [17, "千葉"], [18, "東京"], [19, "神奈川"],
        [9, "新潟"], [10, "富山"], [11, "石川"], [12, "福井"], [20, "山梨"], [21, "長野"], [22, "岐阜"], [23, "静岡"],
        [24, "愛知"],
        [25, "滋賀"], [26, "三重"], [27, "和歌山"], [28, "奈良"], [29, "京都"], [30, "大阪"], [31, "兵庫"],
        [32, "岡山"], [33, "鳥取"], [34, "島根"], [35, "広島"], [36, "山口"], [37, "香川"], [38, "愛媛"], [39, "高知"],
        [40, "徳島"],
        [41, "福岡"], [42, "長崎"], [43, "佐賀"], [48, "大分"], [44, "熊本"], [45, "宮崎"], [46, "鹿児島"], [47, "沖縄"]
    ],
    "1":[
        [2, "北海道"], [3, "青森"], [4, "岩手"], [5, "秋田"], [6, "宮城"], [7, "山形"], [8, "福島"]
    ],
    "2":[
        [13, "茨城"], [14, "栃木"], [15, "群馬"], [16, "埼玉"], [17, "千葉"], [18, "東京"], [19, "神奈川"]
    ],
    "3":[
        [9, "新潟"], [10, "富山"], [11, "石川"], [12, "福井"], [20, "山梨"], [21, "長野"], [22, "岐阜"], [23, "静岡"],
        [24, "愛知"]
    ],
    "4":[
        [25, "滋賀"], [26, "三重"], [27, "和歌山"], [28, "奈良"], [29, "京都"], [30, "大阪"], [31, "兵庫"]
    ],
    "5":[
        [32, "岡山"], [33, "鳥取"], [34, "島根"], [35, "広島"], [36, "山口"], [37, "香川"], [38, "愛媛"], [39, "高知"],
        [40, "徳島"]
    ],
    "6":[
        [41, "福岡"], [42, "長崎"], [43, "佐賀"], [48, "大分"], [44, "熊本"], [45, "宮崎"], [46, "鹿児島"], [47, "沖縄"]
    ]
};

const areaSelect = document.getElementById("areaSelect");

// if you set the searched area option selected, you must set const selectedAreaId in the file calling this func.
const initAreaSelect = () => {

    const selectedRegionId = document.getElementById("regionSelect").value;
    
    
    //既存のareaSelectの選択肢を全消去
    while (areaSelect.firstChild) {
        areaSelect.removeChild(areaSelect.firstChild);
    }

    const areaOptions = areaList[selectedRegionId];
    for(const areaOption of areaOptions) {
        let option = document.createElement("option");
        option.value = areaOption[0];
        option.text = areaOption[1];
        if (option.value == searchedAreaId) {
            option.selected = true;
        }
        areaSelect.appendChild(option);
    }
}

areaSelect.addEventListener('load', initAreaSelect());
