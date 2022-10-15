# HTTP аутентификация

***
## Задание

Спроектировать и разработать систему авторизации пользователей на протоколе HTTP
***
### 1. [Пользовательский интерфейс](https://www.figma.com/file/jfshw1Isat8ymfdXXgeAdc/Lab_1)
***
### 2. Пользовательские сценарии работы
1. [Страница авторизации](https://imgur.com/a/rXe0lus)
2. [Страница регистрации](https://imgur.com/a/SJKmJxe)
3. [Страница восстановления пароля](https://imgur.com/a/5WI4Psf)
4. [Профиль](https://imgur.com/a/dPvykc1)
***
### 3. [API сервера и хореография](https://imgur.com/a/6x46fxg)
***
### 4. Структура базы данных
| id  | user_name  | secret_word | login | email | pass | expire_pass |
|:------------- |:---------------:| -------------:| -------------:| -------------:| -------------:| -------------:|
|               |                 |               |               |               |               |               |

- id: INT, NOT NULL, UNIQUE, PRIMARY KEY, AUTO_INCREMENT  
_(уникальный идентификатор пользователя)_
- user_name: VARCHAR(100), NOT NULL;  
_(имя|фамилия пользователя)_
- secret_word: VARCHAR(32), NOT NULL;  
_(хешированное секретное слово для восстановления пароля)_
- login: VARCHAR(100), NOT NULL;  
_(логин)_
- email: VARCHAR(100), NOT NULL;  
_(почта)_
- pass: VARCHAR(60), NOT NULL;  
_(хешированный пароль)_
- expire_pass: INT, NOT NULL.  
_(срок действия пароля)_
***
### 5. [Алгоритмы](https://viewer.diagrams.net/?tags=%7B%7D&highlight=0000ff&edit=_blank&layers=1&nav=1&title=Algorithms.drawio#R%3Cmxfile%20pages%3D%222%22%3E%3Cdiagram%20id%3D%22C5RBs43oDa-KdzZeNtuy%22%20name%3D%22Index.php%22%3E7V1bd6M4tv41WfNkL5C4PubaUzOZ6ppK%2BnT3I7ZJTDcxbtvpSubXH4ERiC1hBEZYTnDWcmwshED7%2Bu2trQt8%2FfL20yZYL%2F%2BTLML4AhmLtwt8c4EQdh1E%2FqVH3vdHTGx5%2ByPPm2iRHysPPET%2FC%2FODRn70NVqE20rDXZLEu2hdPThPVqtwvqscCzab5Ee12VMSV6%2B6Dp5D7sDDPIj5o79Gi90yP2o6fvnDP8PoeZlf2kPu%2FoeXgDbO72S7DBbJD%2BYQvr3A15sk2e0%2Fvbxdh3H69Ohz%2BfXL%2B6%2Fx%2FZ%2FOT%2F%2F67%2Fav4Jerfz9%2B%2Fb%2FJvrO7NqcUt7AJV7vOXc8C%2F%2Fv2j9vvj5vffw6c139dPf7158TE9r7zv4P4NX9i%2Bd3u3ukjDFeLy3QmyLd5HGy30fwCXy13LzE5YJKPm%2BR1tQjTyxjk23a3Sf4Mr5M42WSnY8PwbCP95SlZ7XICMdPznqI4Ztrd3RlG1k7ydvPHEi4qBJDf%2FE9h8hLuNu%2BkwY9y2u18KpfMhNNjmzAOdtHfVbIJcup7LrorrvAticjwkJGzygRhZ38O5RRkuFNy0DUsO%2Fvzql1uk9fNPMx7YecNduwZ1X4NeoD2tAs2z%2BGO64nMWfDONFunDbYH7oAwBXcHh4fGnUHHlp9BPuxHQb8xE1Meygi1DdFa1ki0%2FRCt6VcnkJBrLzRrVWkWWYpI1uWGf3hcoD0dl1pyRaOMVUSuLqqSq9MPuTrGMOTqonbkSselllybiZVYQuv041McvuVUe9WOgAFZPtnpHzn%2BvAkWESFJ5rdZ9icieid7nSsxmwjISOxPbdcvXx1lLzK6yd6%2B6AcJ6MeJybO7WkR%2FV%2BjI%2Bes1tZ0zmTXZZkLrkjQwzfVbNqn0d%2FLpOftPSMdH6fuVkb1nR6687N2ix80Lz6HHyec70mO1AXm%2Foe%2BkwVX2btNBknvOxplfEpL%2BZpm8zF7Jk7z6sYx24cM6mKe%2F%2FCDe0yF6D%2BLoeZWyBqHQcCNggKcnNJ%2BLGeDpaeFnZM4xwMKZOXZ7Bvg73OzCt4MsUEdL9DvDIqYj4BFoorLsUCG4ttQlsvz2EzeToi10iLbuMrK4pbRFyOI6%2B%2BwyxxFDZ%2FvPdrU9eTezI5cMdfqUChHzfpvTpSyBss2uGOImHwxmJJihfpOOs2gDOCR7p09wU5J9wQyzWlagWoCQXRDHYZwQ2n0hDdfhJiKTnZJ59bdv5Q9N3PMUvYUUTBBoj8NGzqDaRJ6ZJrYEM3lDMpMp0vWHZbWAc%2FIzkhgeiSN4ZLsOVsJuZ8H8z%2Bdskifz%2FZSk3Bqtol0UxLUMe2lnxLxnE48he0PEsAVbeTmz5Ax1x%2FAFe2LBYgUv7IfPsQh%2Fn%2Bdw54Wcsqm0YuVIId1umA5x%2Frly%2BpXgijo%2BMh8zd3vD3KdQLrLC1eSe7CW9T0Mka4ueXe6KwCY5S9K74ejF4O6wFQOyOtFmdBz74A6owgMa85q2vKTjKWbolo5z3x4IBKBSLeYUdprZ8dM5S9%2FphXICwpR7wJNx819rNPvDf%2B%2FpTy5zubtqPwUjdmI7cpAX3E02cEUZN2hyTs96aIYzPdugxRd26C0sxnaOw6dyOP2rZwz8MY%2FXzoUrNYx2djntfP399vIxlb%2BPl1f36f8vKZ18%2FfmRvN%2F%2B9uXh8WE6nR43X4tgu8zaCifPMHL8CE6eqlnxgAdiiowmdMBL739afG5avnx9II3S6fj6%2BPNHmwHf0W0GKNbCwqeL5%2FAh%2F5psdsvkOVkF8W15FHgQZZv7JFnnz%2FqPcLd7zx9p8LpLqtMSvkW739LTp3b%2B7Xfml5u3vOfsy3uNo9JujvaIjwQp7hEdiYaN0Jc0pnXcBGKB39E7xihgnRT%2BFkyLeGqNg1NLZnDz%2Fhv75feyh%2FRreVr2rSCJqpYrxtQzaSBZytALFEUuEDa%2BXe1CGgX1xNq8Z0QfXoYKQqUIPZIIfw7JPv2QtCYUaEN1h6ypi7oRoWPxfflgRKrReInY40grHWnFR%2Fz82m43WuHMLGQPSyjOeRBKqXdLVVto6wN6N%2FvGINCFRm9r0ymy4TQh6TK7iKVphwlLWt3o2zS4eOewBI4NAYF%2F9tDRvsOsDdttBU4aw0KDhoUKA%2BRkYSGMmlXBkWK%2FyEP60PYBJ%2FNMmFjUWXo6cv5Mb8JT4LGnYs9ixIbJCKECEufjHyzSfskIpFsmZJJGVv4REvra%2FKMUUzBoVWDxJhN4YIJTlfa3XACADdQgDtlHFLgvRuYzN1PI5NtqAK54CpfMRUljJ3hJJdlqtl33D6jPPNuyZeSfNw%2BzHBNVkswXSS4RMgiJtz%2FJpT4xuLXkKmxMFloq7M0mcKmdkduzbUq5vhlFwnpZsXzUoJvYndhA7GI5sdsWRoLp0vbhUVmucFRKQSc8iH845oVyeaG271cdsG6kDFP50m5hX6qNCD6gOaaGfpTUUKHbMmhqKPaGkFCfFOrEjkAqdYQ6LQ%2F6MsM6MxotH%2BOtxBZIJGMlWpbD2okTY2oYqAsi2rcFactakKalFb2byCwJnFqRcCWFvBkJDDxL0Xo4EyHxhWpZsV3zCWRda4gFdJaE6dnSzDzMlaFNpvqw9zeMh9bINparFdfAcDin7GU5BibjFd87M0zvSkRgzI6I2EkQMcjNBxCygRExaCRjWSNZGUJm8dmLoyzdPxoqAzWVpU5X6wPKUufoXKi%2BZSl9YqMsHWWptCx18allqY0EsrRHPAss9ABUxdK4wROBGLJqWBHUZnhHLl5qPQajw3Il%2BFRKUXHoifUy3LplksJsCtEVjyehmqVrFdCTShyBhGJx0hEA5eQRdIVFAGgReBoEALV7x7WOt%2B3aPX1NTC%2Fbs0Qhl2MNMduzKx15krjngIaYIFtYuSH2to424WiJnY8lZhs1dHw6S0xHhPDIvA%2FiqUNE39UA0belEX2slz%2BN3TTgXb6q2L4LVyvKY%2FsgMuYNkyPiVZM%2BBOMyDp6gBqq360P8nz3JutAiJqeE2D7ZuxAq1g71Iz5cBnd9ys%2BhRCFV%2BnDiw2wzS%2BAKUME5jCtwJrkQXVfRtpvKZuhXr%2FRFBxDUPtnCKF6om6pygaYaOu%2FC5mMPD7f3t9ePH61kAnzQtmvzBvKgJROcQap6ftLcKA8iQf2wK1wROjS7ikrDqwYDtq%2FzebjddkADjhEfx9coUiVJTJOrviIpSiBI1Z8o0aeatW5mBOUYTeSSYC1vx2oaZuHMF%2B7yoKLIEeA7ZAIvWczPrXHS6moe8oIke0dGVaTxBeOKxkK3k3UOi1%2FZwomF23aMH3v3UQUeVHq2y7tSw64pc0SQxonl3VmaSZw4Su0kDx%2B9ssXEJ84npySq06rDnjWbZrlRHkxp6qrYYEeuosRs7jrOAGCsexqnr8DiZNE8Gimhqx1kIiX94XzNEQ%2B9cqx5j6BrkjUMKUjvLNUbgYpciVMlULG2W212UM%2B1lIvLlZ6zx7jEhenaVNdXkON19ANUdMdyuQCtbhhawp8qDYlnYtm8SK4YSW8msytKMtdhoa98yuJIYHV5bsLoVoEPDBLd8pA2Bvdd9mKMmDY1ZHs2VFy9oli2XUc4rRPnLBv0NLCH543lj8a0uEZB6VSp1BfJyUHT4jx9yiHxcrKFs8ekxXm2eQHT4oojJ0yL8%2BRLJekFpVhASvtdvUlubbjvygnpIxPh6GXqx3X4BDXYi3equssdq5O1wV7asY4mdO6YqajggvKFReH6U8cpf8bdmMDxG68ybM0l71RlnbWjw%2BZKzIZeQJ%2FPefb90KigKunwZMkH1X75drPf2yjLBjMebh%2Fp52PMRc0ywwTP3j51bpgnkSs6uJVILb6Ktdec0KGBF05Ju9ESpCajJuKGzxYxuq6J8KFNCTvqq9wRHHKTLcgNbBBTUICGqgYPxjw6IHeLlbgFccsWK1aWSEeTvHVKLNEkkc7TC8k0zcZIqXwmHbdYRHK9WF%2FiiG5ApBXZHbUB29SxXJZcTeKCWTpgQtLb85mamQI8vXdeHmkBevd8RbYA3DqOXqh2ZGbL9hBHAieoMR78U22V%2BDn25yCOL82SoqReZNi396uhAW0OvEuHPxbY%2Fjhxdy6xoyiAdbIK2%2F6pVpVqByZqIsAsbp%2BLVKAZR0OEfM5HihCCnd9UCzOJSpUnJDauzseHJzZs%2BsTSBhoOC%2BMdx5aoLGXdQMRW5MJpAYL2UUGmJXDajiIbXR9fFgQ1Dc2InNO6XfcO4vK08dHlviQvhBqquPMneAN4MsVMj0lUYxJVrdU74fjPlrR6lWVRmVSraaUb2L0%2F3Kqs932nQdof3gxZmSEjEYKXRYhNpBdEzNMtpMfOBcX4rnpSHBMbAexjIEVwJphWF8ue4UvkVKrZp6h0J75sx2MSFpdeaS7Ehz2UMkV%2B78PDcEHk1zShXdcTU3EXQkNskVNMagvor37NVxLDI3GkeF3Y5d6IuqnaQsLVe3XFHVqt76lZV8bfp%2FI79zFn4bLrE%2BtQ1Zri3tTyZdqzJqnNGMjH1xVs8xzJQZ6smgDfYZMPKFAch0%2FlcPo3cWF1tzK4xpYLFC2oUmfimuNKXFFs41OuxC3c01YbJJzNvTOYAEoFHpMrNa46lnbTselUhJgtctN9gQxTt%2BrYNCVy3VNaWR%2F5VJAxT1arcL4LZrRb4%2FDTskFuQrGtOCvxDdHTgmtoenxaEl5YK1LmC4HMvXD2JKGAg9B7qqFxNwycMOt9GSwy10%2FsEjVQRDNhn3ImRMv09kJnaVKB84U86TdGFpW%2F0INrSSv%2FPtmEL%2Bmg1tvX9P8ie9rk3Ch1YwJyUxfoek%2FkW0Lk4e41%2FZXMzDoiLne0ek59xzjKW23J%2FKd9pAej1%2B1Lkn7dhS%2FrrM9oNY8W0eI185Be07c4mJHrp6139Nrpt5fgeRWkl4mjv16DKXOj61qRS6Z0d8gGXCWrEFBbfojI9%2BxG8I1dfntMCHnfTFCdrZkQKnqKMxpcRotFuOI4ANI5J9xPTsSOMbUwLN7XIyVL1Eo7iQTmaoTJS2B1heUkAtwaCWBpcnVrJq0TuSp69u5hkSuQo6mwmeQMnZqYBU%2FzAvbbJiEPOGwS1sos3DMT8CJjW7hjwRlrArXMIza04ZbJPYp59SvGWqfhtNMozZEozfajnyDgcDmdM7Kh6zZ0ucyCMDVYgcDn2lRWINDIT2Osx221cfEQiw8KSE8ilKpXCs6EW6vFZYNJ0zpcFDB4SnbxcGHWC6IJ0IZouyE%2B52SfFgJySAB4D3iIxlB32T85%2FPzXfIpRemTPN8bU9HmOYz2Zbvs%2B5Br4SFegHnRBPpBzvmCltcjsdJT5R0hxQZ5F%2BBS8xjtlalMXCWEigD76%2FtTFjmtYdvbndBQXIIljeM2oeAHHGIbRKhTxucMw5b6v%2BzjMGJfpIy5jVyWjuBzswIEZJOEvniYw43BlAQSLrIaOB6DzAgY7gdoFSWgdmcEiTxVGZr6H8xQQeh%2BDM2cFyfUTnOmTjhUHZ%2FAQhR9OjNppVlxzgqA6NmG1D3nYjtPsA%2B%2FWYGI0AAF9etwOSS%2Bdw3pVDZkgmPrsdK4li6Fd5khuzNMfsdeU%2FB5xO9W4HcZQZoq2zx0WuMPqK2kr1p26CAnTgWrMrWJ3XkeRwZUsGFw9itIPR%2FDuU4J3tY%2B85q5V5DePqFnnbOYCIDshaIZ1zaXjsplNQSnNwZEaCYjx3DEz3GNmncKZqN%2F8i8XMnqNtKiJGzOzzYWZ90rFizIx6nedr90tgZppVUoCZbghWDO2c6cbVclbtElj61Nr9wIgZdbyaETML6UbqVUvK67pDHpfo5g2dukIf7YiXnTrPDeOTw2WWxNpCvdWmLhICZroh3A9aBjLdhteMEvuj6VFv0ZUu%2BGOR2QAFfzwN9CMlxbMrQ89VaO%2BcBm7jak8u9Bj6qqgFC%2BfSC6kt%2FmNJLHw%2FC2bqmfItvSpdQaGLOzs2kMyw5B4iR9OzlbOkYnrus5hVn5A%2FXZ1YictkBmxaHLtAeGYCtL0DCM9bqqwZmxu9L2%2FPxMRdTlMgZ74MNrvpItgFs2BbZwq3sW9bY54cQKTK6i2LJnErexhmHrQ6vmmJMOiRbEeyLcnWB7W%2FkMBXG5Zo7bPPCtREu5s20JXc6iH5yuFNPan2zmwBmKNNKsOBNIFaoVk3OqNj3N%2BqLNGRKvzNHJGtQt4tZaDPez1UjqE6KCAyPlcCAcextmh3SXdYwY55OU4k5UP%2BNUclq48%2F2eyWyXOyCuL7JAsepjP0R7jbvediO3jdJdX567J1n34xMCrwmjES2rJR60irkyOneYjMxJYhpvPU357dl%2F720an1t87oatc9PivgaloUHF%2BcHlxtITk0qyhjuk6NzjoajrIkU29b73Tj0pAVuJD0np3WIBsc2Dwee70MVs9hRnnb7Y9ks%2BD4cfsjeomDTCnPl1G8uA%2Fek9d0yrc7YrfRb1fLZBP9j7BcUMYzifecMyA2Ki0e0jNzui%2FZGW4AY9Hv%2BVhKdmd9%2BE2YmpTfKN8YxaH7YLu7KJz70itfBNtlvV3HyRPsYB8vRBbffO77Km03KK1tS2C7iZxyhRW27PZQUttU6NN6UMr3Eh1dlobtRV1TP5dFYuH7aMtK6HYEtyJOC%2BR03NYYmXZjX6rtWUqaAnE4k5JWqAGNAjtcXGefXQ6fMqpbabDtC%2FTmkhFmxR5v7HZxbP6TjDxjm10xsrC44nU1Uyo7t91GHkJhOauVlBTEJ1wRxHEYJ0S0vZCGa8bWrvzGGOGNW9NFb%2BGCMibHzw1c%2B2Snf2JZO8v%2BRDLByV4qZa0lIWsRGlTWOiKIt2aee9yEq3jWfcyk%2Bq13m%2F0%2FOpO6SH7HacAepOU%2BNBAGRzGccVOacUHlZ6mGNhY%2FO17NcpaqBpvSOBLLOEefRkazwSUOLnKn6PhUaGR1ROvbopdlvl95A4dHBk%2BgI1OLXjpDVHf%2F4IuWmqMBdPcPbbjLqkLrnevLEwkL67cMXXNbtLPKzbgW6UL5WqQSMNSn5jYdkU7irHdhopkTikHYLYUMcWf9bHCdDStO3N5TJBvoJLRNyzgcdWeXHVX3GZ%2BkoXGzScV11afKw%2BmeLM27SC%2Ba9wCZchXrpAneg2Xojw6n988SAvRwn05eUZ0FeIEYCAOoUYPZv%2FtAOSWDcZH3PcpmUdJmYh3PJm0W%2FSC5lE4WlzCYDj3m3tigwG0diAHd9jb7XkNZwsmMmUe8I0PgxXvzMPPilVkDLoIOj2RkXd1G1676lclnuVROO3HKraTs6o%2BYFvSiFWUnIQPIbdc9nJ3EjQycoMi%2FF%2B59WOPG9BX5oZWLugd9CvdGfdBHFxbwREH8rla0D7egFnSm3JAWBHTI%2FFzule5NVXcKQzNGve3QGOo%2BRslyQt5DMywTx1zYobewVCpZbmJdgZIVxZYVKlmJ9eijhDm9hMGGnzqLxcvkJISF%2FfLVTfJgE%2BYZD%2B6%2F8yGYX77dXD6mvsF0OiXvD7eP9PMxUqJIeRWKjNpFLqpEA%2F%2FkRYW0RaIB2lo9igZBcEG141jGUtu6jh9TZWAM6cKTVBkQ0uiRLjRM%2FexbR5SYXSUaNS3guxqwrh0dSLh60jtMUG7VRV%2FBbSGcrrupYAyDvrAgrmqlRFnu3Ai%2B4%2FItF2OW6CfarN9yZQFn6jbrwgsI1LTqjDeb3PItyWJwbQESDDMtbNQAkMAlma1PoLdSe4KNDp6gCILxdIwoHZNikda6q%2BZYTLGlnr3PLkqEEXEzcJ3H5aCOazQwAmQsW%2F61NQvDC7nD8AsPWV5%2Fv917cMSRu7y6fEg%2FfklTJ7%2F%2BnPpyt799eXh8%2BGgenQMQ5iKV4nQOnSex1FzBOgKpbBe2Xbsp0URcwCXaJrKmrslAMlY3eQFj1Sayp2Zfa7rI102SZjeXzdNSX%2F9JFmHa4v8B%3C%2Fdiagram%3E%3Cdiagram%20id%3D%229_oaDv2Zc78b76hi85lj%22%20name%3D%22%D0%A1%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0%202%22%3EdZHBEoIgEIafhrvClHU2y0snD50Z2YQZdB2k0Xr6dICMsU4s3%2F4%2Fy%2B4SlrfTxfBeXlGAJjQRE2EnQmmasGw%2BFvJ0ZMeODjRGCS9aQaVeEJyePpSAIRJaRG1VH8Mauw5qGzFuDI6x7I46rtrzBjagqrne0psSVjp6oNnKS1CNDJXTve%2Bv5UHsOxkkFzh%2BIVYQlhtE66J2ykEvwwtzcb7zn%2BznYwY6%2B8MwB%2Bvb8yXaECve%3C%2Fdiagram%3E%3C%2Fmxfile%3E)
***
### 6. Примеры HTTP запросов/ответов
#### GET  

URL-адрес запроса: http://site/  
Метод запроса: GET  
Код состояния: 200 OK  
Удаленный адрес: 127.0.0.1:80

**Запрос:**  
_GET / HTTP/1.1  
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9  
Accept-Encoding: gzip, deflate  
Accept-Language: ru,en;q=0.9,en-GB;q=0.8,en-US;q=0.7  
Cache-Control: no-cache  
Connection: keep-alive  
Cookie: PHPSESSID=ioqb1nl8g2d6io3tqc0erdvn4s1agme6  
Host: site  
Pragma: no-cache  
Upgrade-Insecure-Requests: 1  
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36 Edg/105.0.1343.53_

**Ответ:**  
_HTTP/1.1 200 OK  
Date: Wed, 05 Oct 2022 17:14:19 GMT  
Server: Apache  
Expires: Thu, 19 Nov 1981 08:52:00 GMT  
Cache-Control: no-store, no-cache, must-revalidate  
Pragma: no-cache  
Content-Length: 839  
Keep-Alive: timeout=120, max=995  
Connection: Keep-Alive  
Content-Type: text/html; charset=UTF-8_

#### POST  
URL-адрес запроса: http://site/php/sign_in.php  
Метод запроса: POST  
Код состояния: 302 Found  
Удаленный адрес: 127.0.0.1:80

**Запрос:**  
_POST /php/sign_in.php HTTP/1.1  
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9  
Accept-Encoding: gzip, deflate  
Accept-Language: ru,en;q=0.9,en-GB;q=0.8,en-US;q=0.7  
Cache-Control: no-cache  
Connection: keep-alive  
Content-Length: 22  
Content-Type: application/x-www-form-urlencoded  
Cookie: PHPSESSID=fbku0r0gso1stqmb64rjcfig987c7vkk  
Host: site  
Origin: http://site  
Pragma: no-cache  
Referer: http://site/index.php  
Upgrade-Insecure-Requests: 1  
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36 Edg/105.0.1343.53_

**Ответ:**  
_HTTP/1.1 302 Found  
Date: Wed, 05 Oct 2022 17:21:30 GMT  
Server: Apache  
Expires: Thu, 19 Nov 1981 08:52:00 GMT  
Cache-Control: no-store, no-cache, must-revalidate  
Pragma: no-cache  
Location: ../index.php  
Content-Length: 0  
Keep-Alive: timeout=120, max=964  
Connection: Keep-Alive  
Content-Type: text/html; charset=UTF-8_

---
#### GET  
URL-адрес запроса: http://site/register.php  
Метод запроса: GET  
Код состояния: 200 OK  
Удаленный адрес: 127.0.0.1:80

**Запрос:**  
_GET /register.php HTTP/1.1  
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9  
Accept-Encoding: gzip, deflate  
Accept-Language: ru,en;q=0.9,en-GB;q=0.8,en-US;q=0.7  
Cache-Control: no-cache  
Connection: keep-alive  
Cookie: PHPSESSID=ioqb1nl8g2d6io3tqc0erdvn4s1agme6  
Host: site  
Pragma: no-cache  
Referer: http://site/  
Upgrade-Insecure-Requests: 1  
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36 Edg/105.0.1343.53_

**Ответ:**  
_HTTP/1.1 200 OK  
Date: Wed, 05 Oct 2022 17:18:21 GMT  
Server: Apache  
Expires: Thu, 19 Nov 1981 08:52:00 GMT  
Cache-Control: no-store, no-cache, must-revalidate  
Pragma: no-cache  
Set-Cookie: PHPSESSID=ioqb1nl8g2d6io3tqc0erdvn4s1agme6; expires=Wed, 05-Oct-2022 17:20:21 GMT; Max-Age=120; path=/  
Content-Length: 1255  
Keep-Alive: timeout=120, max=979  
Connection: Keep-Alive  
Content-Type: text/html; charset=UTF-8_  
#### POST  
URL-адрес запроса: http://site/php/sign_up.php  
Метод запроса: POST  
Код состояния: 302 Found  
Удаленный адрес: 127.0.0.1:80

**Запрос:**  
_POST /php/sign_up.php HTTP/1.1  
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9  
Accept-Encoding: gzip, deflate  
Accept-Language: ru,en;q=0.9,en-GB;q=0.8,en-US;q=0.7  
Cache-Control: no-cache  
Connection: keep-alive  
Content-Length: 49  
Content-Type: application/x-www-form-urlencoded  
Cookie: PHPSESSID=fbku0r0gso1stqmb64rjcfig987c7vkk  
Host: site  
Origin: http://site  
Pragma: no-cache  
Referer: http://site/register.php  
Upgrade-Insecure-Requests: 1  
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36 Edg/105.0.1343.53_

**Ответ:**  
_HTTP/1.1 302 Found  
Date: Wed, 05 Oct 2022 17:28:51 GMT  
Server: Apache  
Expires: Thu, 19 Nov 1981 08:52:00 GMT  
Cache-Control: no-store, no-cache, must-revalidate  
Pragma: no-cache  
Location: ../register.php  
Content-Length: 0  
Keep-Alive: timeout=120, max=955  
Connection: Keep-Alive  
Content-Type: text/html; charset=UTF-8_

---
#### GET  
URL-адрес запроса: http://site/recover.php  
Метод запроса: GET  
Код состояния: 200 OK  
Удаленный адрес: 127.0.0.1:80

**Запрос:**  
_GET /recover.php HTTP/1.1  
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9  
Accept-Encoding: gzip, deflate  
Accept-Language: ru,en;q=0.9,en-GB;q=0.8,en-US;q=0.7  
Cache-Control: no-cache  
Connection: keep-alive  
Cookie: PHPSESSID=ioqb1nl8g2d6io3tqc0erdvn4s1agme6  
Host: site  
Pragma: no-cache  
Referer: http://site/index.php  
Upgrade-Insecure-Requests: 1  
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36 Edg/105.0.1343.53_

**Ответ:**  
_HTTP/1.1 200 OK  
Date: Wed, 05 Oct 2022 17:20:02 GMT  
Server: Apache  
Expires: Thu, 19 Nov 1981 08:52:00 GMT  
Cache-Control: no-store, no-cache, must-revalidate  
Pragma: no-cache  
Content-Length: 889  
Keep-Alive: timeout=120, max=973  
Connection: Keep-Alive  
Content-Type: text/html; charset=UTF-8_

---
#### GET  
URL-адрес запроса: http://site/profile.php  
Метод запроса: GET  
Код состояния: 200 OK  
Удаленный адрес: 127.0.0.1:80

**Запрос:**  
_GET /profile.php HTTP/1.1  
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9  
Accept-Encoding: gzip, deflate  
Accept-Language: ru,en;q=0.9,en-GB;q=0.8,en-US;q=0.7  
Cache-Control: no-cache  
Connection: keep-alive  
Cookie: PHPSESSID=cudt2ergtqvfjqd938gb7ftbe4lp68u0  
Host: site  
Pragma: no-cache  
Referer: http://site/index.php  
Upgrade-Insecure-Requests: 1  
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36 Edg/105.0.1343.53_

**Ответ:**  
_HTTP/1.1 200 OK  
Date: Wed, 05 Oct 2022 17:32:12 GMT  
Server: Apache  
Expires: Thu, 19 Nov 1981 08:52:00 GMT  
Cache-Control: no-store, no-cache, must-revalidate  
Pragma: no-cache  
Set-Cookie: PHPSESSID=cudt2ergtqvfjqd938gb7ftbe4lp68u0; expires=Wed, 05-Oct-2022 18:32:12 GMT; Max-Age=3600; path=/  
Content-Length: 1267  
Keep-Alive: timeout=120, max=928  
Connection: Keep-Alive  
Content-Type: text/html; charset=UTF-8_

---
### 7. Значимые фрагменты кода
Проверка на существование пользователя в базе данных при входе,
проверка на актуальность пароля, установка авторизованной сессии (index.php)
```php
if (password_verify($pass, $pass_hash)) {
    $cur_time = time();
    $expire_pass = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `expire_pass` FROM `users`WHERE `login` = '$login'"))['expire_pass'];
    if ($cur_time > $expire_pass) {
        $_SESSION['login'] = $login;
        $_SESSION['expire'] = "The password has expired!";
        header('Location: ../recover.php');
        exit();
    }
    if($check_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `login` = '$login'")) {
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "user_name" => $user['user_name'],
            "email" => $user['email'],
            "auth" => true
        ];
        header('Location: ../profile.php');
        $conn->close();
        exit();
    }
    else {
        $_SESSION['error'] = "An error has occurred...";
        header('Location: ../index.php');
        exit();
    }
}
else {
    $_SESSION['error'] = "Incorrect login or password!";
    header('Location: ../index.php');
}
```
Валидация полей при регистрации + проверка на уникальность логина (register.php)
```php
$login = mysqli_real_escape_string($conn, $login);
$check_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `login` = '$login'");
if (mysqli_num_rows($check_user) > 0) {
    $_SESSION['error'] = "This login is already in use!";
    header('Location: ../register.php');
    exit();
}
else if (!$login || !$email || !$pass || !$pass_conf || !$secret) {
    $_SESSION['error'] = "Check the fields!";
    header('Location: ../register.php');
    exit();
}
else if (!check_email($email)) {
    header('Location: ../register.php');
    exit();
}
else if (!check_pass($pass)) {
    header('Location: ../register.php');
    exit();
}
else if ($pass != $pass_conf) {
    $_SESSION['error'] = "Passwords do not match!";
    header('Location: ../register.php');
    exit();
}
```
Хеширование пароля/секретного слова, установка срока действия пароля (7 дней), экранирование данных для безопасного SQL-запроса
```php
$pass = password_hash($pass, PASSWORD_BCRYPT);
$expire_pass = time() + 3600 * 168;
$secret = md5($secret."salt159242");
$user_name = mysqli_real_escape_string($conn, $user_name);
$email = mysqli_real_escape_string($conn, $email);
```
Функции для валидации пароля и почты
```php
function check_pass($val) {
    if (strlen($val) < 8) {
        $_SESSION['error'] = "Password less than 8 characters!";
        return false;
    }
    else if (!preg_match("#[0-9]+#", $val)) {
        $_SESSION['error'] = "Password must include at least one number!";
        return false;
    }
    else if (!preg_match("#[a-zA-Z]+#", $val)) {
        $_SESSION['error'] = "Password must include at least one letter!";
        return false;
    }
    return true;
}

function check_email($val) {
    if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Incorrect e-mail!";
        return false;
    }
    return true;
}
```
Функция для сообщения пользователю о событии / результате его действий
```php
function message() {
    if (isset($_SESSION['error'])) {
        echo '<p class="error_msg"> ' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }
    else if (isset($_SESSION['success'])) {
        echo '<p class="success_msg"> ' . $_SESSION['success'] . '</p>';
        unset($_SESSION['success']);
    }
    else if (isset($_SESSION['expire'])) {
        echo '<p class="error_msg"> ' . $_SESSION['expire'] . '</p>';
    }
}
```
Защита от прямого перехода к запрещенным файлам
```php
if (isset($_SERVER['HTTP_REFERER']) != "http://site/file.php") {
	http_response_code(403);
    exit();
}
```
Инициализация базы данных

```php
$db_name = 'register_db';
$conn = mysqli_connect('127.0.0.1', 'root', 'root');
	
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS $db_name");
$conn = mysqli_connect('127.0.0.1', 'root', 'root', $db_name);

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users(
id INT NOT NULL UNIQUE PRIMARY KEY AUTO_INCREMENT,
	user_name VARCHAR(100) NOT NULL,
	secret_word VARCHAR(32) NOT NULL,
	login VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	pass VARCHAR(60) NOT NULL,
	expire_pass INT NOT NULL
)");
```
