import sys, json, itertools

x = sys.argv[1] 
dic = json.loads(sys.argv[2])

x = int(x)

school_list = []
for line in dic:
    array_temp = []
    for temp in line:
        if "school" in temp:
            array_temp.append(int(line[temp]))
    school_list.append(array_temp)

recom_dict = {}
for i in school_list:
    for j in i:
        if(x == j):
            for item in itertools.combinations(i, 2):
                if x in item:
                    item = sorted(item)
                    item = tuple(item)
                    item = ' '.join(map(str, item))
                    if item in recom_dict:
                        recom_dict[item] += 1
                    else:
                        recom_dict[item] = 1
                    

recom_list = sorted(recom_dict.items(), key = lambda x: (-x[1]))

final_recom = []
for i in range(0, 5):
    temp = recom_list[i][0].replace(str(x), '')
    final_recom.append(int(temp.replace(' ','')))
    
print(json.dumps(final_recom))

