# Soal 1
print("=== Soal 1 ===")
uang = 27012200
pecahan = [100000, 50000, 20000, 10000, 5000, 1000, 500, 100, 50]
for p in pecahan:
    jumlah = uang // p
    uang %= p
    print(f"Jumlah {p} = {jumlah}")

# Soal 2
print("\n=== Soal 2 ===")
rows = 7
cols = 10
for r in range(rows):
    line = ''.join(str((r + c) % 2) for c in range(cols))
    print(line)


# Soal 3
print("\n=== Soal 3 ===")
angka = 1
for i in range(1, 10):
    for j in range(i, i + 1):
        print("".join(str((angka + k) % 10) for k in range(i)))
        angka += 1

# Soal 4
print("\n=== Soal 4 ===")
for i in range(7, 1, -1):
    print(str(i) * i)

# Soal 5
print("\n=== Soal 5 ===")
for i in range(2, 16):
    if i % 2 == 0:
        print(i, "Alfa")
    elif i % 3 == 0:
        print(i, "Midi")
    else:
        print(i)